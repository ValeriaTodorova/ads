<?php 

class Demo_pic extends CI_Controller{
	public function print_pic(){
		$data['title'] = 'title';
		$data['desc'] = 'desc';
		$data['src'] = base_url("assets/img/Wellcome_Image_Awa_3589699k.jpg");
		$this->load->view('pictures', $data);
	}
}