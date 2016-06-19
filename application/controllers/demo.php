<?php 
class Demo extends CI_Controller {
	public function info(){
		echo "Hello world!";
	}

	public function info_par($param){
		echo "Hello, $param!";
	}

	public function demo_view(){
		$this->load->view('hello_view');
	}
}