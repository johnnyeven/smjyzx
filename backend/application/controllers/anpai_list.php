<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anpai_list extends CI_Controller
{
	private $category_id = 29;
	private $page_items = 20;
	private $pageName = 'anpai_list';
	private $user = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->model('check_user', 'check');
		$this->user = $this->check->validate();

		$this->load->helper('url');
	}
	
	public function show($page = 1)
	{
		$this->load->model('mbiao');
		$this->load->model('mbiao_category');
		$this->load->model('mbiao_location');

		$biao_category_result = $this->mbiao_category->read();
		$biao_location_result = $this->mbiao_location->read();
		
		$result = $this->mbiao->read_from_view(array(
			'parent_id'	=>	$this->category_id
		), array(
			'order_by'		=>	array('time', 'desc')
		), $this->page_items, $this->page_items * (intval($page) - 1));

		$count = $this->mbiao->count(array(
			'parent_id'	=>	$this->category_id
		));

		$this->load->library('pagination');
		$config['base_url'] = site_url('anpai_list/show');
		$config['total_rows'] = $count;
		$config['per_page'] = $this->page_items;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);

		$data = array(
			'admin'				=>	$this->user,
			'page_name'			=>	$this->pageName,
			'time'				=>	time(),
			'categories'		=>	$biao_category_result,
			'locations'			=>	$biao_location_result,
			'result'			=>	$result,
			'pagination'		=>	$this->pagination->create_links()
		);
		$this->load->model('render');
		$this->render->render($this->pageName, $data);
	}
	
	public function edit($sliderId = 0)
	{
		if(!empty($sliderId))
		{
			$this->load->model('mbiao');
			$this->load->model('mbiao_category');
			$this->load->model('mbiao_location');

			$biao_category_result = $this->mbiao_category->read();
			$biao_location_result = $this->mbiao_location->read();
			$result = $this->mbiao->read(array(
				'id'		=>	$sliderId
			));
			if($result !== FALSE)
			{
				$result = $result[0];
			}
			
			$data = array(
				'admin'				=>	$this->user,
				'page_name'			=>	$this->pageName,
				'categories'		=>	$category_result,
				'edit'				=>	'1',
				'id'				=>	$sliderId,
				'value'				=>	$result,
				'categories'		=>	$biao_category_result,
				'locations'			=>	$biao_location_result,
			);
			$this->load->model('render');
			$this->render->render($this->pageName, $data);
		}
	}
	
	public function delete($sliderId = 0)
	{
		if(!empty($sliderId))
		{
			$this->load->model('mbiao');
				
			$this->mbiao->delete($sliderId);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_DELETE_SUCCESS', '', 'anpai_list/show', true, 5);
	}
	
	public function submit()
	{
		$this->load->model('mbiao');
		
		$edit = $this->input->post('edit', TRUE);
		$sliderId = $this->input->post('id', TRUE);
		$number = $this->input->post('biaoNumber', TRUE);
		$name = $this->input->post('biaoName', TRUE);
		$category = $this->input->post('biaoCategory', TRUE);
		$location = $this->input->post('biaoLocation', TRUE);
		$start_time = $this->input->post('articleTime', TRUE);
		$start_hour = $this->input->post('startHours', TRUE);
		$start_minute = $this->input->post('startMinutes', TRUE);
		$start_second = $this->input->post('startSeconds', TRUE);
		$content = $this->input->post('wysiwyg', TRUE);

		if(empty($name) || empty($content) || empty($category) || empty($location))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'anpai_list/show', true, 5);
		}
		$number = empty($number) ? '' : $number;
		$time = time();
		$start_hour = empty($start_hour) ? '00' : $start_hour;
		$start_minute = empty($start_minute) ? '00' : $start_minute;
		$start_second = empty($start_second) ? '00' : $start_second;
		$start_time = strtotime($start_time . ' ' . $start_hour . ':' . $start_minute . ':' . $start_second);
		
		$row = array(
			'parent_id'		=>	$this->category_id,
			'number'		=>	$number,
			'name'			=>	$name,
			'category'		=>	$category,
			'location'		=>	$location,
			'start_time'	=>	$start_time,
			'content'		=>	$content
		);
		
		if(!empty($edit))
		{
			$this->mbiao->update($sliderId, $row);
		}
		else
		{
			$row['time'] = $time;
			$this->mbiao->create($row);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_SUBMIT_SUCCESS', '', 'anpai_list/show', true, 5);
	}
}

?>