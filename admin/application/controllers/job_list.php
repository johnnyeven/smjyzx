<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_list extends CI_Controller
{
	private $pageName = 'job_list';
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
		$jobCategory = $this->input->post('jobCategory', TRUE);
		$jobCategory = empty($jobCategory) ? '' : $jobCategory;
		if(!empty($jobCategory))
		{
			$parameter = array(
				'job_category'		=>	$jobCategory
			);
		}
		$this->load->model('job');
		$extension = array(
			'order_by'		=>	array('job_endtime', 'desc')
		);
		$result = $this->job->read($parameter, $extension);
		
		$data = array(
			'admin'					=>	$this->user,
			'page_name'			=>	$this->pageName,
			'category'				=>	$jobCategory,
			'result'					=>	$result
		);
		$this->load->model('render');
		$this->render->render($this->pageName, $data);
	}
	
	public function delete($jobId = 0)
	{
		if(!empty($jobId))
		{
			$this->load->model('job');
			
			$this->job->delete($jobId);
		}
		redirect('job_list');
	}
}

?>