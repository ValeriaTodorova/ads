<?php
class Img extends CI_controller{
	
	public function pic_view(){

		$data['title']="The title";
		$data['desc']="Description";
		$data['src']=base_url("/assets/img/934138_10204293372653263_2466807394265488728_n.jpg");

		$this->load->view('img_view', $data);

	
	}
}