<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends CI_Controller
{
	private $pageName = 'config';
	private $user = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->model('check_user', 'check');
		$this->user = $this->check->validate();
	}
	
	public function index()
	{
		$this->load->model('mconfig');
		
		$result = $this->mconfig->read();
		if(!empty($result))
		{
			$result = $result[0];
		}
		$data = array(
			'admin'					=>	$this->user,
			'page_name'			=>	$this->pageName,
			'row'						=>	$result,
		);
		$this->load->model('render');
		$this->render->render($this->pageName, $data);
	}
	
	public function submit()
	{
		$this->load->model('mconfig');
		
		$configId = $this->input->post('configId', TRUE);
		$configTitle = $this->input->post('configTitle', TRUE);
		$configFooter = $this->input->post('configFooter', TRUE);
		
		$row = array(
			'config_title'		=>	$configTitle,
			'config_footer'	=>	$configFooter
		);
		
		$this->mconfig->update($configId, $row);
		redirect('config');
	}
}

?>