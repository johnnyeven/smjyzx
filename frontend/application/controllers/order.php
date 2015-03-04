<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller
{
	private $page_items = 15;
	public function __construct()
	{
		parent::__construct ();
	}

	public function lists($category_id, $page = 0)
	{
		if(!empty($category_id) && is_numeric($category_id))
		{
			$this->load->helper('language');
			$this->lang->load('date');
			$this->load->helper('string');
			$this->load->model('mbiao');
			$this->load->model('mcategory');

			$search_time = $this->input->post('searchTime', TRUE);
			if(!empty($search_time))
			{
				$time = strtotime($search_time);
				$current_week = intval(date('W', time()));
				$search_week = intval(date('W', $time));
				$page = $search_week - $current_week;
			}
			else
			{
				$time = time() + intval($page) * 7 * 86400;
			}
			$day = intval(date('w', $time)) - 1;
			if($day < 0) $day = 6;

			$monday_start = date('Y-m-d', $time - $day * 86400) . " 00:00:00";
			$friday_end = date('Y-m-d', $time + (4 - $day) * 86400) . " 23:59:59";
			$monday_starttime = strtotime($monday_start);
			$friday_endtime = strtotime($friday_end);

			$category_result = $this->mcategory->read(array(
				'id'	=>	intval($category_id)
			));
			$result = $this->mbiao->read_from_view(array(
				'parent_id'	=>	intval($category_id),
				'start_time >='	=>	$monday_starttime,
				'start_time <='	=>	$friday_endtime
			));

			if(!empty($category_result))
			{
				$category_name = $category_result[0]->name;
			}
			$week = array(
				'1'	=>	array(),
				'2'	=>	array(),
				'3'	=>	array(),
				'4'	=>	array(),
				'5'	=>	array()
			);
			foreach($result as $row)
			{
				$week[date('w', $row->start_time)][] = $row;
			}

			$pagination = '<form action="" method="post" style="margin-bottom:0;">';
			$pagination .= '<a href="' . site_url('order/lists/' . $category_id . '/' . (intval($page) - 1)) . '">上周</a> | <a href="' . site_url('order/lists/' . $category_id . '/0') . '">本周</a> | <a href="' . site_url('order/lists/' . $category_id . '/' . (intval($page) + 1)) . '">下周</a> | ';
			$pagination .= '<input style="margin-bottom:0;" type="text" class="input-small datepicker" name="searchTime" value="" />';
			$pagination .= '<input type="hidden" name="' . $this->security->get_csrf_token_name() . '" value="' . $this->security->get_csrf_hash() . '" />';
			$pagination .= ' <button type="submit" class="btn btn-primary">跳转</button>';
			$pagination .= '</form>';

			$data = array(
				'category_name'		=>	$category_name,
				'result'			=>	$week,
				'pagination'		=>	$pagination,
				'monday_time'		=>	$monday_starttime,
				'friday_time'		=>	$friday_endtime
			);
			$this->load->model('render');
			$this->render->render('order_list', $data);
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
			$this->load->model('mbiao');
			$result = $this->mbiao->read_from_view(array(
				'id'	=>	intval($id)
			));
			if(!empty($result))
			{
				$data = array(
					'result'	=>	$result[0]
				);
				$this->load->model('render');
				$this->render->render('bid', $data);
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