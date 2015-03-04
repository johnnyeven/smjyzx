<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yuyue_list extends CI_Controller
{
	private $category_id = 28;
	private $page_items = 10;
	private $pageName = 'yuyue_list';
	private $user = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
		$this->load->model('check_user', 'check');
		$this->user = $this->check->validate();

		$this->load->helper('url');
	}
	
	public function show($page = 0)
	{
		$this->load->helper('language');
		$this->lang->load('day');

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

		$this->load->model('mbiao');
		$this->load->model('mbiao_category');
		$this->load->model('mbiao_location');
		$this->load->model('mbiao_unit');

		$biao_category_result = $this->mbiao_category->read();
		$biao_location_result = $this->mbiao_location->read();
		$biao_unit_result = $this->mbiao_unit->read();
		
		$result = $this->mbiao->read_from_view(array(
			'parent_id'		=>	$this->category_id,
			'start_time >='	=>	$monday_starttime,
			'start_time <='	=>	$friday_endtime
		), array(
			'order_by'		=>	array('time', 'asc')
		));
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
		$pagination .= '<a href="' . site_url('anpai_list/show/' . (intval($page) - 1)) . '">上周</a> | <a href="' . site_url('anpai_list/show/0') . '">本周</a> | <a href="' . site_url('anpai_list/show/' . (intval($page) + 1)) . '">下周</a> | ';
		$pagination .= '<input style="margin-bottom:0;" type="text" class="input-small datepicker" name="searchTime" value="" />';
		$pagination .= ' <button type="submit" class="btn btn-primary">跳转</button>';
		$pagination .= '</form>';
		$data = array(
			'admin'				=>	$this->user,
			'page_name'			=>	$this->pageName,
			'time'				=>	$time,
			'categories'		=>	$biao_category_result,
			'locations'			=>	$biao_location_result,
			'units'				=>	$biao_unit_result,
			'result'			=>	$week,
			'pagination'		=>	$pagination,
			'monday'			=>	$monday_start,
			'friday'			=>	$friday_end,
			'monday_time'		=>	$monday_starttime,
			'friday_time'		=>	$friday_endtime
		);
		$this->load->model('render');
		$this->render->render($this->pageName, $data);
	}
	
	public function edit($sliderId = 0)
	{
		if(!empty($sliderId))
		{
			$this->load->model('mbiao');
			$this->load->model('mbiao_category');
			$this->load->model('mbiao_location');
			$this->load->model('mbiao_unit');

			$biao_category_result = $this->mbiao_category->read();
			$biao_location_result = $this->mbiao_location->read();
			$biao_unit_result = $this->mbiao_unit->read();
			$result = $this->mbiao->read(array(
				'id'		=>	$sliderId
			));
			if($result !== FALSE)
			{
				$result = $result[0];
			}
			
			$data = array(
				'admin'				=>	$this->user,
				'page_name'			=>	$this->pageName,
				'categories'		=>	$category_result,
				'edit'				=>	'1',
				'id'				=>	$sliderId,
				'value'				=>	$result,
				'categories'		=>	$biao_category_result,
				'locations'			=>	$biao_location_result,
				'units'				=>	$biao_unit_result
			);
			$this->load->model('render');
			$this->render->render($this->pageName, $data);
		}
	}
	
	public function delete($sliderId = 0)
	{
		if(!empty($sliderId))
		{
			$this->load->model('mbiao');
				
			$this->mbiao->delete($sliderId);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_DELETE_SUCCESS', '', 'yuyue_list/show', true, 5);
	}
	
	public function submit()
	{
		$this->load->model('mbiao');
		
		$edit = $this->input->post('edit', TRUE);
		$sliderId = $this->input->post('id', TRUE);
		$number = $this->input->post('biaoNumber', TRUE);
		$name = $this->input->post('biaoName', TRUE);
		$category = $this->input->post('biaoCategory', TRUE);
		$location = $this->input->post('biaoLocation', TRUE);
		$unit = $this->input->post('biaoUnit', TRUE);
		$start_time = $this->input->post('articleTime', TRUE);
		$start_hour = $this->input->post('startHours', TRUE);
		$start_minute = $this->input->post('startMinutes', TRUE);
		$start_second = $this->input->post('startSeconds', TRUE);
		$content = $this->input->post('wysiwyg', TRUE);
		$url = $this->input->post('articleUrl', TRUE);

		if(empty($name) || empty($category) || empty($location) || empty($unit))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'yuyue_list/show', true, 5);
		}
		$number = empty($number) ? '' : $number;
		$time = time();
		$url = empty($url) ? '' : $url;
		$start_hour = empty($start_hour) ? '00' : $start_hour;
		$start_minute = empty($start_minute) ? '00' : $start_minute;
		$start_second = empty($start_second) ? '00' : $start_second;
		$start_time = strtotime($start_time . ' ' . $start_hour . ':' . $start_minute . ':' . $start_second);
		
		$row = array(
			'parent_id'		=>	$this->category_id,
			'number'		=>	$number,
			'name'			=>	$name,
			'unit'			=>	$unit,
			'category'		=>	$category,
			'location'		=>	$location,
			'start_time'	=>	$start_time,
			'content'		=>	$content,
			'url'			=>	$url
		);
		
		if(!empty($edit))
		{
			$this->mbiao->update($sliderId, $row);
		}
		else
		{
			$row['time'] = $time;
			$this->mbiao->create($row);
		}
		showMessage(MESSAGE_TYPE_SUCCESS, 'ARTICLE_SUBMIT_SUCCESS', '', 'yuyue_list/show', true, 5);
	}
}

?>