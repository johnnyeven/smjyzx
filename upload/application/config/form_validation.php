<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
	'users/login'	=>	array(
		array(
			'field'		=>	'username',
			'rules'		=>	'required|min_length[6]|max_length[32]|alpha_numeric'
		),
		array(
			'field'		=>	'password',
			'rules'		=>	'required|min_length[6]|max_length[20]'
		)
	),
	'users/register'	=>	array(
		array(
			'field'		=>	'username',
			'rules'		=>	'required|min_length[6]|max_length[32]|alpha_numeric'
		),
		array(
			'field'		=>	'password',
			'rules'		=>	'required|min_length[6]|max_length[20]'
		)
	),
	'developers/login'	=>	array(
		array(
			'field'		=>	'username',
			'rules'		=>	'required|min_length[6]|max_length[32]|alpha_numeric'
		),
		array(
			'field'		=>	'password',
			'rules'		=>	'required|min_length[6]|max_length[20]'
		)
	),
	'developers/register'	=>	array(
		array(
			'field'		=>	'username',
			'rules'		=>	'required|min_length[6]|max_length[32]|alpha_numeric'
		),
		array(
			'field'		=>	'password',
			'rules'		=>	'required|min_length[6]|max_length[20]'
		)
	),
	'softwares/add'		=>	array(
		array(
			'field'		=>	'name',
			'rules'		=>	'required'
		),
		array(
			'field'		=>	'developer_id',
			'rules'		=>	'required|numeric'
		),
		array(
			'field'		=>	'secretkey',
			'rules'		=>	'required|min_length[32]|max_length[32]|alpha_numeric'
		)
	),
	'softwares/modify'		=>	array(
		array(
			'field'		=>	'id',
			'rules'		=>	'required|numeric'
		),
		array(
			'field'		=>	'name',
			'rules'		=>	'required'
		),
		array(
			'field'		=>	'developer_id',
			'rules'		=>	'required|numeric'
		),
		array(
			'field'		=>	'secretkey',
			'rules'		=>	'required|min_length[32]|max_length[32]|alpha_numeric'
		)
	),
	'softwares/delete'		=>	array(
		array(
			'field'		=>	'id',
			'rules'		=>	'required|numeric'
		)
	),
	'softwares/list'		=>	array(
		array(
			'field'		=>	'developer_id',
			'rules'		=>	'required|numeric'
		)
	)
);