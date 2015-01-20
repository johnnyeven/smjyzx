<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jianjie_list extends CI_Controller
{
	private $category_id = 1;
	private $pageName = 'jianjie_list';
	private $user = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->model('check_user', 'check');
		$this->user = $this->check->validate();
	}
	
	public function index($articleId = 0)
	{
		$this->load->model('marticle');
		if(!empty($articleId))
		{
			$result = $this->marticle->read(array(
				'id'		=>	$articleId
			));
		}
		else
		{
			$result = $this->marticle->read(array(
				'category_id'	=>	$this->category_id
			));
		}

		$this->load->model('render');
		if($result !== FALSE)
		{
			$result = $result[0];
			$data = array(
				'admin'					=>	$this->user,
				'page_name'			=>	$this->pageName,
				'edit'						=>	'1',
				'article_id'				=>	$result->id,
				'row'						=>	$result
			);
		}
		else
		{
			$data = array(
				'admin'				=>	$this->user,
				'page_name'			=>	$this->pageName
			);
		}
		$this->render->render($this->pageName, $data);
	}
	
	public function submit()
	{
		$this->load->model('marticle');
		
		$edit = $this->input->post('edit', TRUE);
		$articleId = $this->input->post('articleId', TRUE);
		$article_title = $this->input->post('articleTitle', TRUE);
		$article_refer = $this->input->post('articleRefer', TRUE);
		$article_time = $this->input->post('articleTime', TRUE);
		$article_content = $this->input->post('wysiwyg');

		if(empty($article_title) || empty($article_content))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'jianjie_list', true, 5);
		}
		$article_refer = empty($article_refer) ? '' : $article_refer;
		$article_time = empty($article_time) ? time() : strtotime($article_time);
		
		$row = array(
			'category_id'		=>	$this->category_id,
			'name'				=>	$article_title,
			'refer'				=>	$article_refer,
			'time'				=>	$article_time,
			'content'			=>	$article_content
		);
		
		if(!empty($edit))
		{
			$this->marticle->update($articleId, $row);
		}
		else
		{
			$this->marticle->create($row);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_SUBMIT_SUCCESS', '', 'jianjie_list', true, 5);
	}
}

?>