<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function shorty_string($str, $len)
{
	$len = empty($len) ? 48 : $len;
	$length = (strlen($str) + mb_strlen($str,'UTF8')) / 2; 
	if($length > $len)
	{
		$str = mb_substr($str, 0, intval($len / 2), 'utf-8') . '...';
	}
	return $str;
}
?>