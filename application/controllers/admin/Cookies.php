<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cookies extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
			redirect('admin/login');
		}
		$this->load->model('m_data');
	}

	public function index(){
		$this->load->view('admin/cookies');
	}

	public function data(){
		if($this->input->is_ajax_request()){

			$this->load->library('ssp');

			$table = 'cookies';
			$primaryKey = 'id_cookie';
			$columns = array(
				array('db' => 'id_cookie', 'dt' => 0),
				array(
					'db' => 'tgl', 
					'dt' => 1,
					'formatter' => function($d, $row){
						return fix_datetime($d);
					}
				),
				array(
					'db' => 'value', 
					'dt' => 2,
					'formatter' => function($d, $row){
						return html_escape($d);
					}
				),
				array(
					'db' => 'host', 
					'dt' => 3,
					'formatter' => function($d, $row){
						return html_escape($d);
					}
				),
				array(
					'db' => 'id_cookie', 
					'dt' => 4,
					'formatter' => function($d, $row){
						return '<a href="#" class="btn btn-primary view" data-id="'.$d.'"><i class="fa fa-search-plus"></i></a> <a href="#" class="btn btn-danger delete" data-id="'.$d.'"><i class="fa fa-trash"></i></a>';
					}
				),
			);

			$sql_details = array(
				'user' => $this->db->username,
				'pass' => $this->db->password,
				'db'   => $this->db->database,
				'host' => $this->db->hostname
			);

			echo json_encode(
				SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
			);
		}
		else{
			show_404();
		}
	}

	public function view($id=null){
		if($this->input->is_ajax_request() && !empty($id)){
			$where = array('id_cookie' => $id);
			$output = $this->m_data->get_where($where, 'cookies')->row();

			if(!empty($output)){
				echo json_encode(parse_cookie($output->value));
			}
			else{
				show_404();
			}
		}
		else{
			show_404();
		}
	}

	public function hapus($id=null){
		if($this->input->is_ajax_request() && !empty($id)){
			$where = array('id_cookie' => $id);
			$output = array(
				'status' => true,
				'id' => $this->m_data->delete($where, 'cookies'),
			);
			echo json_encode($output);
		}
		else{
			show_404();
		}
	}
}
