<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller
{
	public function __construct()
	{
		parent::__construct ();
	}

	public function show($id)
	{
		if(!empty($id) && is_numeric($id))
		{
			$this->load->model('marticle');
			$result = $this->marticle->read(array(
				'id'	=>	intval($id)
			));
			if(!empty($result))
			{
				$data = array(
					'result'	=>	$result[0]
				);
				$this->load->view('article', $data);
			}
			else
			{
				showMessage(MESSAGE_TYPE_ERROR, 'EMPTY_RESULT', '', 'index.html', false, 5);
			}
		}
		else
		{
			showMessage(MESSAGE_TYPE_ERROR, 'INVALID_PARAMS', '', 'index.html', true, 5);
		}
	}
}

?>