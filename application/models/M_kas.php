<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kas extends CI_Model {

	public function info($id=null){
		return $this->db
			->select('kas_checkpoint.id_kas, date, amount, COUNT(kas_checkpoint.id_kas) AS total')
			->join('kas_detail', 'kas_detail.id_kas = kas_checkpoint.id_kas', 'left')
			->join('kas_member', 'kas_member.id_member = kas_detail.id_member', 'left')
			->group_by('kas_checkpoint.id_kas')
			->where('kas_checkpoint.id_kas', $id)
			->get('kas_checkpoint')
			->row();
	}

	public function get_unpaid($id=null){
		return $this->db
			->join('kas_detail', 'kas_detail.id_kas = kas_checkpoint.id_kas', 'left')
			->join('kas_member', 'kas_member.id_member = kas_detail.id_member', 'left')
			->where('kas_detail.status', '0')
			->where('kas_checkpoint.id_kas', $id)
			->get('kas_checkpoint')
			->result();
	}

	public function get_paid($id=null){
		return $this->db
			->join('kas_detail', 'kas_detail.id_kas = kas_checkpoint.id_kas', 'left')
			->join('kas_member', 'kas_member.id_member = kas_detail.id_member', 'left')
			->where('kas_detail.status', '1')
			->where('kas_checkpoint.id_kas', $id)
			->get('kas_checkpoint')
			->result();
	}

	public function get_member_kas($id=null){
		return $this->db
			->join('kas_detail', 'kas_detail.id_kas = kas_checkpoint.id_kas', 'left')
			->join('kas_member', 'kas_member.id_member = kas_detail.id_member', 'left')
			->where('kas_detail.status', '0')
			->where('kas_detail.id_member', $id)
			->get('kas_checkpoint')
			->result();
	}

	public function total_unpaid($id){
		return $this->db
			->where('id_kas', $id)
			->where('status', '0')
			->from('kas_detail')
			->count_all_results();
	}

	public function get_print($where){
		$data = $this->db
			->where($where)
			->get('kas_checkpoint')
			->result_array();

		foreach ($data as $key => $value) {
			$data[$key]['payment'] = $this->db
				->select('kas_detail.status, nickname')
				->join('kas_member', 'kas_member.id_member = kas_detail.id_member', 'left')
				->where('id_kas', $value['id_kas'])
				->order_by('nickname')
				->get('kas_detail')
				->result_array();
		}

		return $data;
	}

}
