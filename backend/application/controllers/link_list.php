<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class link_list extends CI_Controller
{
	private $page_items = 10;
	private $pageName = 'link_list';
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
		$this->load->model('mlink');
		
		$result = $this->mlink->read();
		$count = $this->mlink->count();

		$this->load->library('pagination');
		$config['base_url'] = site_url('link_list/show');
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
			$this->load->model('mlink');

			$result = $this->mlink->read(array(
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
			$this->load->model('mlink');
				
			$this->mlink->delete($sliderId);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'LINK_DELETE_SUCCESS', '', 'link_list/show', true, 5);
	}
	
	public function submit()
	{
		$this->load->model('mlink');
		
		$edit = $this->input->post('edit', TRUE);
		$sliderId = $this->input->post('id', TRUE);
		$name = $this->input->post('linkName', TRUE);
		$link = $this->input->post('linkUrl', TRUE);

		if(empty($name) || empty($link))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'link_list/show', true, 5);
		}
		
		$row = array(
			'name'			=>	$name,
			'link'			=>	$link,
		);
		
		if(!empty($edit))
		{
			$this->mlink->update($sliderId, $row);
		}
		else
		{
			$this->mlink->create($row);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'LINK_SUBMIT_SUCCESS', '', 'link_list/show', true, 5);
	}
}

?>