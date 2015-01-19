<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_add extends CI_Controller
{
	private $pageName = 'job_add';
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
		$data = array(
			'admin'					=>	$this->user,
			'page_name'			=>	$this->pageName
		);
		$this->load->model('render');
		$this->render->render($this->pageName, $data);
	}
	
	public function edit($jobId = 0)
	{
		if(!empty($jobId))
		{
			$this->load->model('job');
			$result = $this->job->read(array(
				'job_id'		=>	$jobId
			));
			if($result !== FALSE)
			{
				$result = $result[0];
			}

			$this->load->model('render');
			$data = array(
				'admin'					=>	$this->user,
				'page_name'			=>	$this->pageName,
				'edit'				=>	'1',
				'job_id'			=>	$jobId,
				'row'				=>	$result
			);
			$this->render->render($this->pageName, $data);
		}
	}
	
	public function submit()
	{
		$this->load->model('job');
		
		$edit = $this->input->post('edit', TRUE);
		$jobId = $this->input->post('jobId', TRUE);
		$jobName = $this->input->post('jobName', TRUE);
		$jobCategory = $this->input->post('jobCategory', TRUE);
		$jobCount = $this->input->post('jobCount', TRUE);
		$jobExp = $this->input->post('jobExp', TRUE);
		$jobEndtime = $this->input->post('jobEndtime', TRUE);
		$jobContent = $this->input->post('wysiwyg');
		
		if(empty($jobName) || empty($jobContent))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'job_add', true, 5);
		}
		
		$row = array(
			'job_name'				=>	$jobName,
			'job_category'		=>	intval($jobCategory),
			'job_count'				=>	intval($jobCount),
			'job_exp'				=>	$jobExp,
			'job_content'			=>	$jobContent,
			'job_posttime'		=>	time(),
			'job_endtime'			=>	strtotime("{$jobEndtime} 00:00:00")
		);
		
		if(!empty($edit))
		{
			$this->job->update($jobId, $row);
		}
		else
		{
			$this->job->create($row);
		}
		redirect('job_list');
	}
}

?>