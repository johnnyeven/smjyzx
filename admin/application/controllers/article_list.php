<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_list extends CI_Controller
{
	private $pageName = 'article_list';
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
		$this->load->model('marticle');
		$result = $this->marticle->read();
		
		$data = array(
			'admin'					=>	$this->user,
			'page_name'			=>	$this->pageName,
			'result'					=>	$result
		);
		$this->load->model('render');
		$this->render->render($this->pageName, $data);
	}
}

?>