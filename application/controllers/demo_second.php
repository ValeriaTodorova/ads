<?php 
class Demo_second extends CI_Controller{
	public function load_demo(){
		$this->load->view('demo_links');
	}
	public function load_second_view(){
		$this->load->view('demo_links_second');

	}
}