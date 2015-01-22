<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class biao_location_list extends CI_Controller
{
	private $category_id = 6;
	private $page_items = 20;
	private $pageName = 'biao_location_list';
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
		$this->load->model('mbiao_location');
		
		$result = $this->mbiao_location->read();

		$data = array(
			'admin'				=>	$this->user,
			'page_name'			=>	$this->pageName,
			'result'			=>	$result
		);
		$this->load->model('render');
		$this->render->render($this->pageName, $data);
	}
	
	public function edit($sliderId = 0)
	{
		if(!empty($sliderId))
		{
			$this->load->model('mbiao_location');
			$result = $this->mbiao_location->read(array(
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
			$this->load->model('mbiao_location');
				
			$this->mbiao_location->delete($sliderId);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_DELETE_SUCCESS', '', 'biao_location_list/show', true, 5);
	}
	
	public function submit()
	{
		$this->load->model('mbiao_location');
		
		$edit = $this->input->post('edit', TRUE);
		$sliderId = $this->input->post('id', TRUE);
		$name = $this->input->post('newsName', TRUE);

		if(empty($name))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'biao_location_list/show', true, 5);
		}
		$refer = empty($refer) ? '' : $refer;
		$time = empty($time) ? time() : strtotime($time);
		
		$row = array(
			'name'	=>	$name
		);
		
		if(!empty($edit))
		{
			$this->mbiao_location->update($sliderId, $row);
		}
		else
		{
			$this->mbiao_location->create($row);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_SUBMIT_SUCCESS', '', 'biao_location_list/show', true, 5);
	}
}

?>