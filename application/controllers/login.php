
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('login_model');
	}


//Insert
	public function show_add_user(){

		//$this->load->view('users/add_user_view');
		$data['dynamic_view'] = 'users/add_user_view';
        $data['title'] = 'User view';

        $this->load->view('templates/main_template', $data);

	}

	public function index()//insert_user()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_message('required', 'Полето %s е задължително');
		$this->form_validation->set_rules('username', 'Потребител', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

		//$this->form_validation->set_error_delimiters('<div class="error  id=....">', '</div>');
 

 		if($this->form_validation->run() === FALSE)
 		{
	 	    $this->show_add_user();
 			//$this->load->view('users/Error');
 		}
 		else
 		{
 			
 			$this->users_model->add_user();
 			//echo "<p>".anchor('login/log_in', 'Login')."</p>";-оригинален ред
 			 $this->load->view('login/log_in', 'Login');

		}
	}

	//Login	
	public function log_in($param = NULL){
		$data['param'] = $param;
		
		//$this->load->view('users/login_view', $data);
		$data['dynamic_view'] = 'users/login_view';
        $data['title'] = 'Login';

        $this->load->view('templates/main_template', $data);
	}

	public function procedure(){
		
		$result = $this->login_model->validate();
		
		if(! $result){
			$param = '<font color=red>Invalid username and/or password.</font><br />';
			$this->log_in($param);
			
			//$this->load->view('users/Error');
		}else{
			
			//$this->load->view('users/hello');
			$data['dynamic_view'] = 'users/hello';
       		$data['title'] = 'Hello';

        	$this->load->view('templates/main_template', $data);
		}		
	}
	
	public function Hello(){
		//$this->load->view('users/hello2');
		$data['dynamic_view'] = 'users/hello2';
       	$data['title'] = 'Hello';

        $this->load->view('templates/main_template', $data);
	}

	public function Phone_number(){
		//$this->load->view('users/phone');
		$data['dynamic_view'] = 'users/phone';
       	$data['title'] = 'Phone';

        $this->load->view('templates/main_template', $data);

	}

	public function All_information(){
		//$this->load->view('users/all_info');
		$data['dynamic_view'] = 'users/all_info';
       	$data['title'] = 'All info';

        $this->load->view('templates/main_template', $data);
	}

	public function upload(){
		//$data['dynamic_view'] = 'users/upoalds/upload_form';
       	//$data['title'] = 'Upload form';

        //$this->load->view('templates/main_template', $data);

        $this->load->view('users/uploads/upload_form', array('error' => ' ' ));
	}

	public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 200;
                

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        //$this->index($error);

                        $this->load->view('users/uploads/upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data('file_name'));

                        $this->load->view('users/uploads/success_upload', $data);

                       // $data['upload_data'] = $this->upload->data('file_name');
                       // $data['dynamic_view'] = 'uploads/success_upload';                     
                    //   $this->load->view('templates/main_template', $data);
                }
        }


}