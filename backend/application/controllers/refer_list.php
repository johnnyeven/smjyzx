<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Refer_list extends CI_Controller
{
	private $page_items = 10;
	private $pageName = 'refer_list';
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
		$this->load->model('mrefer');
		
		$result = $this->mrefer->read();
		$count = $this->mrefer->count();

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
			$this->load->model('mrefer');

			$result = $this->mrefer->read(array(
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
			$this->load->model('mrefer');
				
			$this->mrefer->delete($sliderId);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'REFER_DELETE_SUCCESS', '', 'refer_list/show', true, 5);
	}
	
	public function submit()
	{
		$this->load->model('mrefer');
		
		$edit = $this->input->post('edit', TRUE);
		$sliderId = $this->input->post('id', TRUE);
		$name = $this->input->post('linkName', TRUE);

		if(empty($name))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'refer_list/show', true, 5);
		}
		
		$row = array(
			'name'			=>	$name
		);
		
		if(!empty($edit))
		{
			$this->mrefer->update($sliderId, $row);
		}
		else
		{
			$this->mrefer->create($row);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'REFER_SUBMIT_SUCCESS', '', 'refer_list/show', true, 5);
	}
}

?>