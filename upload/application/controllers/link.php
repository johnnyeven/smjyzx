<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link extends CI_Controller
{
	private $page_items = 15;
	public function __construct()
	{
		parent::__construct ();
	}

	public function show($page = 1)
	{
		$this->load->model('mlink');

		$result = $this->mlink->read(null, null, $this->page_items, $this->page_items * (intval($page) - 1));
		$count = $this->mlink->count();

		$this->load->library('pagination');
		$config['suffix'] = '.html';
		$config['base_url'] = base_url('link/show');
		$config['total_rows'] = $count;
		$config['per_page'] = $this->page_items;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);

		$data = array(
			'result'			=>	$result,
			'pagination'		=>	$this->pagination->create_links()
		);
		$this->load->model('render');
		$this->render->render('link', $data);
	}
}

?>