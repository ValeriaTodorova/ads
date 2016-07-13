<?php

class Cities_model extends CI_Model{

	public function get_all_cities(){
		$this->db->select('*');
		$this->db->from('cities');

		$query = $this->db->get();

		return $query->result_array();
	}

}