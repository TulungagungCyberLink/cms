<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index(){
		$members = $this->m_data->get_nick_sc()->result_array();
		$members = array_column($members, 'nick');

		$start = file_get_contents('./uploads/tcl_pre.deface');
		$middle = '';
		$end = file_get_contents('./uploads/tcl_suffix.deface');

		for ($i=0; $i < count($members); $i++) {
			if($i%2 == 0){
				$members[$i] = '<font color="red">'.$members[$i].'</font>';
			}
			else{
				$members[$i] = '<font color="blue">'.$members[$i].'</font>';
			}
		}

		$middle = implode(' | ', $members);

		$this->load->helper('download');

		force_download('index.html', $start.$middle.$end);
		exit;
	}
}
