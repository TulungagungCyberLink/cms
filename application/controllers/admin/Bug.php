<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bug extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != 'admin'){
            redirect('admin/login');
        }
		$this->load->model('m_data');
	}
    public function index(){
        $this->load->helper('file');

        $data['logs'] = get_filenames('./application/logs/');
        unset($data['logs'][array_search("index.html",$data['logs'])]);
        $data['logs'] = array_reverse($data['logs']);

        $this->load->view('admin/bug', $data);
    }

    public function api($file=null){
        if($this->input->is_ajax_request()){
            $this->load->helper('file');
            echo read_file('./application/logs/'.$file);
        }
        elseif($this->input->get('type') == 'download' && $file != null){
            $this->load->helper('download');;    
            force_download('./application/logs/'.$file, NULL);
            redirect('admin/bug');
        }
        elseif($this->input->get('type') == 'delete' && $file != null){
            unlink('./application/logs/'.$file);
            redirect('admin/bug');
        }
        else{
            not_found();
        }
    }
}