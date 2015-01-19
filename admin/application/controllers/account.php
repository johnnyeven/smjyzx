<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
{
	private $pageName = 'account';
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
		$this->load->model('admin');
		
		if($this->user->admin_init != '1')
		{
			$parameter = array(
				'admin_id'		=>	$this->user->admin_id
			);
		}
		$result = $this->admin->read($parameter, array(
			'order_by'		=>	array('admin_id', 'desc')
		));
		$data = array(
			'admin'					=>	$this->user,
			'page_name'			=>	$this->pageName,
			'result'					=>	$result,
		);
		$this->load->model('render');
		$this->render->render($this->pageName, $data);
	}
	
	public function edit($adminId = 0)
	{
		if(!empty($adminId))
		{
			if($this->user->admin_init != '1' && $this->user->admin_id != $adminId)
			{
				showMessage(MESSAGE_TYPE_ERROR, 'USER_NO_PERMISSION', '', 'account', true, 5);
			}
			$this->load->model('admin');
			$result = $this->admin->read(array(
				'admin_id'		=>	$adminId
			));
			if($result !== FALSE)
			{
				$result = $result[0];
			}
			
			$data = array(
				'admin'					=>	$this->user,
				'page_name'			=>	$this->pageName,
				'edit'						=>	'1',
				'admin_id'				=>	$adminId,
				'value'					=>	$result
			);
			$this->load->model('render');
			$this->render->render($this->pageName, $data);
		}
	}
	
	public function delete($adminId = 0)
	{
		if(!empty($adminId))
		{
			if($this->user->admin_init != '1')
			{
				showMessage(MESSAGE_TYPE_ERROR, 'USER_NO_PERMISSION', '', 'account', true, 5);
			}
			$this->load->model('admin');
			
			$result = $this->admin->read(array(
				'admin_id'		=>	$adminId
			));
			if(!empty($result))
			{
				$row = $result[0];
				if($row->admin_init == '1')
				{
					showMessage(MESSAGE_TYPE_ERROR, 'USER_DELETE_FORBIDDEN', '', 'account', true, 5);
				}
			}
			$this->admin->delete($adminId);
		}
		redirect('account');
	}
	
	public function submit()
	{
		$this->load->model('admin');
		$this->load->helper('security');
		
		$edit = $this->input->post('edit', TRUE);
		$adminId = $this->input->post('adminId', TRUE);
		$adminAccount = $this->input->post('adminAccount', TRUE);
		$adminPass = $this->input->post('adminPass', TRUE);

		if($this->user->admin_init != '1' && $this->user->admin_id != $adminId)
		{
			showMessage(MESSAGE_TYPE_ERROR, 'USER_NO_PERMISSION', '', 'account', true, 5);
		}
		
		if(empty($adminAccount) || (empty($edit) && empty($adminPass)))
		{
			showMessage(MESSAGE_TYPE_ERROR, 'NO_PARAM', '', 'account', true, 5);
		}
		
		$row = array(
			'admin_account'		=>	$adminAccount,
			'admin_starttime'	=>	time()
		);
		
		if(!empty($edit))
		{
			if(!empty($adminPass))
			{
				$row['admin_pass'] = encrypt_pass($adminPass);
			}
			$this->admin->update($adminId, $row);
		}
		else
		{
			$row['admin_pass'] = encrypt_pass($adminPass);
			$this->admin->create($row);
		}
		redirect('account');
	}
}

?>