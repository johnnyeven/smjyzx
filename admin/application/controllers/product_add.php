<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_add extends CI_Controller
{
	private $pageName = 'product_add';
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
	
	public function edit($productId = 0)
	{
		if(!empty($productId))
		{
			$this->load->model('product');
			$result = $this->product->read(array(
				'product_id'		=>	$productId
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
				'product_id'			=>	$productId,
				'row'						=>	$result
			);
			$this->render->render($this->pageName, $data);
		}
	}
	
	public function submit()
	{
		$this->load->model('product');
		
		$edit = $this->input->post('edit', TRUE);
		$productId = $this->input->post('productId', TRUE);
		$productName = $this->input->post('productName', TRUE);
		$productContent = $this->input->post('wysiwyg');
		$productIOSDownload = $this->input->post('productIOSDownload');
		$productAndroidDownload = $this->input->post('productAndroidDownload');
		$productLogoUrl = $this->input->post('productLogoUrl', TRUE);
		$productImageUrl = $this->input->post('productImageUrl', TRUE);
		$productSort = $this->input->post('productSort', TRUE);
		
		if(empty($productName) || empty($productContent))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'product_list', true, 5);
		}
		
		$row = array(
			'product_name'						=>	$productName,
			'product_content'					=>	$productContent,
			'product_ios_download'			=>	$productIOSDownload,
			'product_android_download'	=>	$productAndroidDownload,
			'product_logo_url'					=>	$productLogoUrl,
			'product_image_url'				=>	$productImageUrl,
			'product_sort'						=>	$productSort
		);
		
		if(!empty($edit))
		{
			$this->product->update($productId, $row);
		}
		else
		{
			$this->product->create($row);
		}
		redirect('product_list');
	}
}

?>