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

		//政府采购 采购预公告
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	13
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//政府采购 采购公告
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	14
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//政府采购 更正公告
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	15
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//政府采购 中标结果
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	16
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//产权交易 交易信息
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	18
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//产权交易 更正信息
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	19
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//产权交易 成交信息
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	20
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//土地出让 出让公告
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	22
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//土地出让 更正公告
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	23
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//土地出让 出让结果
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	24
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 6);

		//图片快讯
		$part1_3_result = $this->marticle->read(array(
			'category_id'	=>	25
		), array(
			'order_by'		=>	array(
				'time',
				'desc'
			)
		), 10);

		$this->load->model('mbiao');
		//场地预约
		$yuyue_result = $this->mbiao->read(array(
			'parent_id'		=>	28
		), array(
			'order_by'		=>	array(
				'start_time',
				'asc'
			)
		));

		//开标安排
		$kaibiao_result = $this->mbiao->read(array(
			'parent_id'		=>	29
		), array(
			'order_by'		=>	array(
				'start_time',
				'asc'
			)
		));

		$this->load->view('index', $data);
	}
}

?>