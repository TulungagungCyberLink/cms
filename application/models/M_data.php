<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

	public function get_slider(){
		return $this->db
			->order_by('urutan_slider_text')
			->get('slider_text');
	}

	public function get_member(){
		return $this->db
			->join('role', 'member.id_role = role.id_role', 'left')
			->order_by('member.id_role')
			->get('member');
	}

	public function get_message($perpage, $from=0){
		return $this->db
			->order_by('id_message')
			->limit($perpage, $from)
			->get('message');
	}

	public function count($table){
		return $this->db->count_all_results($table);
	}

	public function get_nick_sc(){
		return $this->db->order_by('urutan')->get('nick_sc');
	}

	public function config($name, $value=null){
		if(is_null($value)){
			$data = $this->db
				->where('nama_config', $name)
				->get('config')->row();

			return isset($data->value_config) ? $data->value_config : null;
		}
		else{
			$this->db
				->where('nama_config', $name)
				->update('config', array('value_config' => $value));
			return $this->db->affected_rows();
		}
	}


	/* CRUD */

	public function delete($where, $table){
		return $this->db
			->where($where)
			->delete($table);
	}

	public function update($where, $data, $table){
		$this->db
			->where($where)
			->update($table, $data);
		return $this->db->affected_rows();
	}

	public function update_batch($table, $data, $where_column){
		return $this->db->update_batch($table, $data, $where_column);
	}
	
	public function insert($data, $table){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function get_where($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function get($table){
		return $this->db->get($table);
	}
}
