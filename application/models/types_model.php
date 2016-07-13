<?php

class Types_model extends CI_Model{

	public function get_all_types(){
		$this->db->select('*');
		$this->db->from('types');

		$query = $this->db->get();

		return $query->result_array();
	}

}