<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pic_list extends CI_Controller
{
	private $category_id = 25;
	private $page_items = 10;
	private $pageName = 'pic_list';
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
		
		$result = $this->marticle->read(array(
			'category_id'	=>	$this->category_id
		), array(
			'order_by'		=>	array('time', 'desc')
		), $this->page_items, $this->page_items * (intval($page) - 1));
		$count = $this->marticle->count(array(
			'category_id'	=>	$this->category_id
		));

		$this->load->library('pagination');
		$config['base_url'] = site_url('pic_list/show');
		$config['total_rows'] = $count;
		$config['per_page'] = $this->page_items;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);

		$data = array(
			'admin'				=>	$this->user,
			'page_name'			=>	$this->pageName,
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
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_DELETE_SUCCESS', '', 'pic_list/show', true, 5);
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
		$pic = $this->input->post('newsPicFilepath', TRUE);
		$indexShow = $this->input->post('indexShow', TRUE);

		if(empty($name) || empty($pic))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'news_list/show', true, 5);
		}
		$refer = empty($refer) ? '' : $refer;
		$time = empty($time) ? time() : strtotime($time);
		$content = empty($content) ? '' : $content;
		
		$row = array(
			'category_id'	=>	empty($category) ? $this->category_id : intval($category),
			'name'			=>	$name,
			'refer'			=>	$refer,
			'content'		=>	$content,
			'pic'			=>	$pic,
			'show_in_index'	=>	!empty($indexShow) ? 1 : 0
		);
		
		if(!empty($edit))
		{
			$this->marticle->update($sliderId, $row);
		}
		else
		{
			$row['time'] = $time;
			$this->marticle->create($row);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_SUBMIT_SUCCESS', '', 'pic_list/show', true, 5);
	}
}

?>