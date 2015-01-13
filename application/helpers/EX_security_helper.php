<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function encrypt_password($password)
{
	$CI =& get_instance();
	$CI->load->config('security_config');
	return do_hash(do_hash($password, 'md5') . $CI->config->item('password_encrypt_key'));
}

?>