<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}
	
	public function index()
	{
		$redirectUrl = $this->input->get('redirect', TRUE);

		$this->load->model('check_user', 'check');
		$user = $this->check->validate(false);
		if(!empty($user))
		{
			if(!empty($redirectUrl))
			{
				redirect(urldecode($redirectUrl));
			}
			else
			{
				redirect('job_list');
			}
		}
		else
		{
			$this->load->view('login_view');
		}
	}
	
	public function submit()
	{
		$redirectUrl = $this->input->post('redirect', TRUE);
		$accountName = $this->input->post('accountName', TRUE);
		$accountPass = $this->input->post('accountPass', TRUE);
		$cookieRemain = $this->input->post('cookieRemain', TRUE);
		$isAjaxRequest = $this->input->post('isAjaxRequest', TRUE);
		
		if(!empty($accountName) && !empty($accountPass))
		{
			$this->load->model('admin');
			$this->load->helper('security');
			
			$parameter = array(
				'admin_account'		=>	$accountName,
				'admin_pass'			=>	encrypt_pass($accountPass)
			);
			$result = $this->admin->read($parameter);
			
			if($result === FALSE)
			{
				showMessage(MESSAGE_TYPE_ERROR, 'USER_INVALID', '', 'login?redirect=' . $redirectUrl, true, 5);
			}
			else
			{
				$row = $result[0];
				$cookie = array(
					'admin_id'			=>		$row->admin_id,
					'admin_account'	=>		$accountName
				);
				$cookieStr = json_encode($cookie);
				$this->load->helper('ucenter_sync');
				$cookieStr = _authcode($cookieStr, 'ENCODE');
	
				$this->load->helper('cookie');
				$cookie = array(
						'name'		=> 'user',
						'value'		=> $cookieStr,
						'expire'	=> $this->config->item('cookie_expire'),
						'domain'	=> $this->config->item('cookie_domain'),
						'path'		=> $this->config->item('cookie_path'),
						'prefix'	=> $this->config->item('cookie_prefix')
				);
				if($cookieRemain=='1') {
					$cookie['expire'] = strval(intval($this->config->item('cookie_expire')) * 30);
				}
	            $this->input->set_cookie($cookie);
	            
	            $this->admin->update($row->admin_id, array(
	            		'admin_lastlogin'	=>	time()
	            ));
	            
				$redirectUrl = empty($redirectUrl) ? 'job_list' : $redirectUrl;
				showMessage(MESSAGE_TYPE_SUCCESS, 'USER_LOGIN_SUCCESS', $result, $redirectUrl, true, 5);
			}
		}
		else
		{
			showMessage(MESSAGE_TYPE_ERROR, 'USER_LOGIN_ERROR_NO_PARAM', '', 'login?redirect=' . $redirectUrl, true, 5);
		}
	}
	
	public function out()
	{
		$this->load->helper('cookie');
		
		$cookie = array(
			'name'		=> 'user',
			'domain'	=> $this->config->item('cookie_domain'),
			'path'		=> $this->config->item('cookie_path'),
			'prefix'	=> $this->config->item('cookie_prefix')
		);
		delete_cookie($cookie);
		showMessage(MESSAGE_TYPE_SUCCESS, 'USER_LOGOUT', '退出成功', 'login', true, 5);
	}
}

?>