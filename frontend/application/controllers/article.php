<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller
{
	private $page_items = 15;
	public function __construct()
	{
		parent::__construct ();
	}

	public function lists($category_id, $page = 1)
	{
		if(!empty($category_id) && is_numeric($category_id))
		{
			$this->load->model('marticle');
			$this->load->model('mcategory');
			$category_result = $this->mcategory->read(array(
				'id'	=>	intval($category_id)
			));
			$result = $this->marticle->read_from_view(array(
				'category_id'	=>	intval($category_id)
			), null, $this->page_items, $this->page_items * (intval($page) - 1));
			$count = $this->marticle->count(array(
				'category_id'	=>	intval($category_id)
			));

			if(!empty($category_result))
			{
				$category_name = $category_result[0]->name;
			}

			$this->load->library('pagination');
			$config['uri_segment'] = 4;
			$config['suffix'] = '.html';
			$config['base_url'] = base_url('article/lists/' . $category_id);
			$config['total_rows'] = $count;
			$config['per_page'] = $this->page_items;
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config);

			$data = array(
				'category_name'		=>	$category_name,
				'result'			=>	$result,
				'pagination'		=>	$this->pagination->create_links()
			);
			$this->load->model('render');
			$this->render->render('article_list', $data);
		}
		else
		{
			showMessage(MESSAGE_TYPE_ERROR, 'INVALID_PARAMS', '', 'index', true, 5);
		}
	}

	public function show($id)
	{
		if(!empty($id) && is_numeric($id))
		{
			$this->load->model('marticle');
			$result = $this->marticle->read_from_view(array(
				'id'	=>	intval($id)
			));
			if(!empty($result))
			{
				$data = array(
					'result'	=>	$result[0]
				);
				$this->load->model('render');
				$this->render->render('article', $data);
			}
			else
			{
				showMessage(MESSAGE_TYPE_ERROR, 'EMPTY_RESULT', '', 'index', false, 5);
			}
		}
		else
		{
			showMessage(MESSAGE_TYPE_ERROR, 'INVALID_PARAMS', '', 'index', true, 5);
		}
	}

	public function single($category_id)
	{
		if(!empty($category_id) && is_numeric($category_id))
		{
			$this->load->model('marticle');
			$result = $this->marticle->read_from_view(array(
				'category_id'	=>	intval($category_id)
			));
			if(!empty($result))
			{
				$data = array(
					'result'	=>	$result[0]
				);
				$this->load->model('render');
				$this->render->render('article', $data);
			}
			else
			{
				showMessage(MESSAGE_TYPE_ERROR, 'EMPTY_RESULT', '', 'index', false, 5);
			}
		}
		else
		{
			showMessage(MESSAGE_TYPE_ERROR, 'INVALID_PARAMS', '', 'index', true, 5);
		}
	}
}

?>