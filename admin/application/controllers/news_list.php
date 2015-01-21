<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news_list extends CI_Controller
{
	private $page_items = 20;
	private $pageName = 'news_list';
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
		$this->load->model('mdownload');
		
		$result = $this->mdownload->read(null, array(
			'order_by'		=>	array('time', 'desc')
		), $this->page_items, $this->page_items * (intval($page) - 1));
		$count = $this->mdownload->count();

		$this->load->library('pagination');
		$config['base_url'] = site_url('news_list/show');
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
			$this->load->model('mdownload');
			$result = $this->mdownload->read(array(
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
			$this->load->model('mdownload');
				
			$this->mdownload->delete($sliderId);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'DOWNLOAD_DELETE_SUCCESS', '', 'news_list/show', true, 5);
	}
	
	public function submit()
	{
		$this->load->model('mdownload');
		
		$edit = $this->input->post('edit', TRUE);
		$sliderId = $this->input->post('id', TRUE);
		$download_name = $this->input->post('downloadName', TRUE);
		$download_filepath = $this->input->post('downloadFilepath', TRUE);

		if(empty($download_name) || empty($download_filepath))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'news_list/show', true, 5);
		}
		
		$row = array(
			'name'			=>	$download_name,
			'filepath'		=>	$download_filepath
		);
		
		if(!empty($edit))
		{
			$this->mdownload->update($sliderId, $row);
		}
		else
		{
			$row['time'] = time();
			$this->mdownload->create($row);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'DOWNLOAD_SUBMIT_SUCCESS', '', 'news_list/show', true, 5);
	}
}

?>