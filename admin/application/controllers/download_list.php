<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_list extends CI_Controller
{
	private $page_items = 20;
	private $pageName = 'download_list';
	private $user = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->model('check_user', 'check');
		$this->user = $this->check->validate();
	}
	
	public function show($page = 1)
	{
		$this->load->model('mdownload');
		
		$result = $this->mdownload->read(null, array(
			'order_by'		=>	array('time', 'desc')
		), $this->page_items, $this->page_items * (intval($page) - 1));

		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('download_list/show');
		$config['total_rows'] = count($result);
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
			$this->load->model('slider');
			$result = $this->slider->read(array(
				'slider_id'		=>	$sliderId
			));
			if($result !== FALSE)
			{
				$result = $result[0];
			}
			
			$data = array(
				'admin'					=>	$this->user,
				'page_name'			=>	$this->pageName,
				'edit'						=>	'1',
				'slider_id'				=>	$sliderId,
				'value'					=>	$result
			);
			$this->load->model('render');
			$this->render->render($this->pageName, $data);
		}
	}
	
	public function delete($sliderId = 0)
	{
		if(!empty($sliderId))
		{
			$this->load->model('slider');
				
			$this->slider->delete($sliderId);
		}
		redirect('sliders');
	}
	
	public function submit()
	{
		$this->load->model('slider');
		
		$edit = $this->input->post('edit', TRUE);
		$sliderId = $this->input->post('sliderId', TRUE);
		$sliderPicPath = $this->input->post('sliderPicPath', TRUE);
		$sliderUrl = $this->input->post('sliderUrl', TRUE);
		$sliderSort = $this->input->post('sliderSort', TRUE);

		if(empty($sliderPicPath))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'sliders', true, 5);
		}
		
		$row = array(
			'slider_pic_path'			=>	$sliderPicPath,
			'slider_url'				=>	$sliderUrl,
			'slider_sort'				=>	$sliderSort
		);
		
		if(!empty($edit))
		{
			$this->slider->update($sliderId, $row);
		}
		else
		{
			$this->slider->create($row);
		}
		redirect('sliders');
	}
}

?>