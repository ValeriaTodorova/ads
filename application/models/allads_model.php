<?php
class allads_model extends CI_Model{

	public function get_all_allads(){
		
		$this->db->select('*');
		$this->db->from('allads');
		$this->db->join('cities', 'cities.id_city = allads.id_city');
		$this->db->join('types', 'types.id_type = allads.id_type');
		
		$this->db->where('allads.date_deleted =', NULL);
		
		$query = $this->db->get();

		return $result = $query->result_array();
		}

	public function add_allads()
	{	
		$allads = array(
			'description' =>$this->input->post('description'),
			'price' => $this->input->post('price'),
			'id_city' => $this->input->post('cities'),
			'id_type' => $this->input->post('types')
			);

		return $this->db->insert('allads', $allads);
	}

//update query
  public function get_allads($id){
		$this->db->select('*');
		$this->db->from('allads');
		$this->db->where('id_allads', $id);
		$q = $this->db->get();
		return $result = $q->row();
	}

	public function update_allads($id){

		$allads = array(
			'description' =>$this->input->post('description'),
			'price' => $this->input->post('price'),
			'id_city' => $this->input->post('cities'),
			'id_type' => $this->input->post('types')
			);
		
		$this->db->where('id_allads', $id);
		$this->db->update('allads', $allads);
	}

	//delete
	
	public function get_delete_allads($id){

		$this->db->select('description');
		$this->db->from('allads');
		//$this->db->where('message_id', $id);
		$q = $this->db->get();
		return $result = $q->result();
	}

	public function delete_allads($id){ 
		$date = date('Y-m-d');
		$date_del = array(
			'date_deleted' => $date
			);
		$this->db->where('id_allads', $id);

		$this->db->update('allads', $date_del);
	}

	
}