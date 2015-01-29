<?php
function getCategoryPic($categoryId)
{
	switch($categoryId)
	{
		case '1':
			return 'resources/images/zp_js.jpg';
		case '2':
			return 'resources/images/zp_yw.jpg';
		case '3':
			return 'resources/images/zp_ms.jpg';
		case '4':
			return 'resources/images/zp_zn.jpg';
	}
}

function getCategoryName($categoryId)
{
	switch($categoryId)
	{
		case '1':
			return '技术类';
		case '2':
			return '业务类';
		case '3':
			return '美术类';
		case '4':
			return '职能类';
	}
}
?>