<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tudi_list extends CI_Controller
{
	private $category_id = 21;
	private $page_items = 20;
	private $pageName = 'tudi_list';
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
		$this->load->model('marticle');
		$this->load->model('mcategory');
		
		$category_result = $this->mcategory->read(array(
			'parent_id'		=>	$this->category_id
		));
		if(!empty($category_result))
		{
			$categories = array();
			foreach($category_result as $item)
			{
				array_push($categories, $item->id);
			}
			$result = $this->marticle->read_from_view(null, array(
				'order_by'		=>	array('time', 'desc'),
				'where_in'		=>	array('category_id', $categories)
			), $this->page_items, $this->page_items * (intval($page) - 1));
			$count = $this->marticle->count(null, array(
				'where_in'		=>	array('category_id', $categories)
			));
		}
		else
		{
			$result = $this->marticle->read_from_view(array(
				'category_id'	=>	$this->category_id
			), array(
				'order_by'		=>	array('time', 'desc')
			), $this->page_items, $this->page_items * (intval($page) - 1));
			$count = $this->marticle->count(array(
				'category_id'	=>	$this->category_id
			));
		}

		$this->load->library('pagination');
		$config['base_url'] = site_url('tudi_list/show');
		$config['total_rows'] = $count;
		$config['per_page'] = $this->page_items;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);

		$data = array(
			'admin'				=>	$this->user,
			'page_name'			=>	$this->pageName,
			'categories'		=>	$category_result,
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
			$this->load->model('marticle');
			$this->load->model('mcategory');

			$category_result = $this->mcategory->read(array(
				'parent_id'		=>	$this->category_id
			));
			$result = $this->marticle->read(array(
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
				'value'				=>	$result
			);
			$this->load->model('render');
			$this->render->render($this->pageName, $data);
		}
	}
	
	public function delete($sliderId = 0)
	{
		if(!empty($sliderId))
		{
			$this->load->model('marticle');
				
			$this->marticle->delete($sliderId);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_DELETE_SUCCESS', '', 'tudi_list/show', true, 5);
	}
	
	public function submit()
	{
		$this->load->model('marticle');
		
		$edit = $this->input->post('edit', TRUE);
		$sliderId = $this->input->post('id', TRUE);
		$name = $this->input->post('newsName', TRUE);
		$category = $this->input->post('newsCategory', TRUE);
		$refer = $this->input->post('newsRefer', TRUE);
		$time = $this->input->post('articleTime', TRUE);
		$content = $this->input->post('wysiwyg', TRUE);

		if(empty($name) || empty($content))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'tudi_list/show', true, 5);
		}
		$refer = empty($refer) ? '' : $refer;
		$time = empty($time) ? time() : strtotime($time);
		
		$row = array(
			'category_id'	=>	empty($category) ? $this->category_id : intval($category),
			'name'			=>	$name,
			'refer'			=>	$refer,
			'time'			=>	$time,
			'content'		=>	$content
		);
		
		if(!empty($edit))
		{
			$this->marticle->update($sliderId, $row);
		}
		else
		{
			$this->marticle->create($row);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_SUBMIT_SUCCESS', '', 'tudi_list/show', true, 5);
	}
}

?>