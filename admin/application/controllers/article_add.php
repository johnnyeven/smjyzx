<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_add extends CI_Controller
{
	private $pageName = 'article_add';
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
	
	public function edit($articleId = 0)
	{
		if(!empty($articleId))
		{
			$this->load->model('marticle');
			$result = $this->marticle->read(array(
				'article_id'		=>	$articleId
			));
			if($result !== FALSE)
			{
				$result = $result[0];
			}

			$this->load->model('render');
			$data = array(
				'admin'					=>	$this->user,
				'page_name'			=>	$this->pageName,
				'edit'						=>	'1',
				'article_id'				=>	$articleId,
				'row'						=>	$result
			);
			$this->render->render($this->pageName, $data);
		}
	}
	
	public function submit()
	{
		$this->load->model('marticle');
		
		$edit = $this->input->post('edit', TRUE);
		$articleId = $this->input->post('articleId', TRUE);
		$articleTitle = $this->input->post('articleTitle', TRUE);
		$articleContent = $this->input->post('wysiwyg');
		
		if(empty($articleTitle) || empty($articleContent))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'article_list', true, 5);
		}
		
		$row = array(
			'article_title'				=>	$articleTitle,
			'article_content'			=>	$articleContent,
			'article_posttime'		=>	time(),
		);
		
		if(!empty($edit))
		{
			$this->marticle->update($articleId, $row);
		}
		else
		{
			$this->marticle->create($row);
		}
		redirect('article_list');
	}
}

?>