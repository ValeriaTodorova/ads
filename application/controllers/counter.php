<?php 
class Counter extends CI_Controller{
	//
	public function load_view_first($param)
	{
		$data['num'] = $param;

		$this->load->view('counter_view', $data);

	}

	public function increase($param1){
		$param1++;
		$data['num'] = $param1;

		$this->load->view('counter_view', $data);

	}
}