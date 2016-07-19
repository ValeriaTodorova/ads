<?php
class all_ads extends CI_controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('all_ads_model');
		$this->load->model('cities_model');
		$this->load->model('types_model');
        $this->output->enable_profiler(TRUE);
		
	}

	public function index(){

		$data['all_all_ads'] = $this->all_ads_model->get_all_all_ads();

		$data['dynamic_view'] = 'all_ads/all_all_ads_view';
        $data['description'] = 'all_ads';

        $this->load->view('templates/main_template', $data);

		
	}

	public function show_add_all_ads()
	{
		$data['cities'] = $this->cities_model->get_all_cities();
		$data['types'] = $this->types_model->get_all_types();

		
		$data['dynamic_view'] = 'all_ads/add_all_ads_view';
        $data['description'] = 'Add description';

        $this->load->view('templates/main_template', $data);
	}

	public function insert_all_ads(){

		$this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
				
 		if($this->form_validation->run() === FALSE)
 		{
	 	     $this->show_add_all_ads();
 		}
 		else
 		{
 			$this->all_ads_model->add_all_ads();

 			echo "Successfully inserted a new add in DB!";

 			
 			$data['dynamic_view'] = 'all_ads/view_db';
        	$data['description'] = 'Insert add';

        	$this->load->view('templates/main_template', $data);
 			
		}
	}
//update
	public function show_update_all_ads(){
       	$id = $_GET['id'];
        $data['all_ads_info'] = $this->all_ads_model->get_all_ads($id);
        $data['cities'] = $this->cities_model->get_all_cities();
		$data['types'] = $this->types_model->get_all_types();

       
        $data['dynamic_view'] = 'all_ads/update_all_ads_view';
        $data['description'] = 'Update add';

        $this->load->view('templates/main_template', $data);
 			
    }

    public function update_all_ads($id)
    {
       
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
		        
        if($this->form_validation->run() === FALSE)
        {
            $this->show_update_message($id);
        }
        else 
        {
            $this->all_ads_model->update_all_ads($id);
            echo "<p>Successfully updated a add in DB!</p>";
            $this->load->view('/all_ads/view_db');
        }

    }

//delete

   

    public function del_all_ads(){
        $id = $_GET['id'];
    	 $this->all_ads_model->delete_all_ads($id);
          echo "Successfully deleted a add from DB!";

          $this->load->view('/all_ads/view_db');
    }

}