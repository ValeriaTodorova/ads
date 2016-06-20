<?php 
class User extends CI_Controller {
	
	public function load_login(){
		$this->load->view("login_view");
	}

}