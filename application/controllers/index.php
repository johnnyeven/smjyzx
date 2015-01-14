<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct ();
	}
	
	public function index()
	{
		$this->load->model('marticle');

		//滚动图片
		$slider_result = $this->marticle->read(array(
			'category_id'	=>	5
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 5);

		//中心动态
		$news_result = $this->marticle->read(array(
			'category_id'	=>	6
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//通知公告
		$notification_result = $this->marticle->read(array(
			'category_id'	=>	7
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//横幅
		$banner_result = $this->marticle->read(array(
			'category_id'	=>	27
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 1);

		//建设工程 招标公告
		$part1_1_result = $this->marticle->read(array(
			'category_id'	=>	9
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//建设工程 更正公告
		$part1_2_result = $this->marticle->read(array(
			'category_id'	=>	10
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//建设工程 中标结果
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	11
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		// $this->load->view('index', $data);
	}
}

?>