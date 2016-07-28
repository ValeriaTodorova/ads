<?php
class allads extends CI_controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('allads_model');
		$this->load->model('cities_model');
		$this->load->model('types_model');
        $this->output->enable_profiler(TRUE);
		
	}

	public function index(){

		$data['all_allads'] = $this->allads_model->get_all_allads();

		$data['dynamic_view'] = 'allads/all_allads_view';
        $data['description'] = 'allads';

        $this->load->view('templates/main_template', $data);

		
	}

	public function show_add_allads()
	{
		$data['cities'] = $this->cities_model->get_all_cities();
		$data['types'] = $this->types_model->get_all_types();

		
		$data['dynamic_view'] = 'allads/add_allads_view';
        $data['description'] = 'Add description';

        $this->load->view('templates/main_template', $data);
	}

	public function insert_allads(){

        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
                
        if($this->form_validation->run() === FALSE)
        {
             $this->show_add_allads();
        }
        else
        {
            $this->allads_model->add_allads();

            echo "Successfully inserted a new resource in DB!";

 			//view for file upload instead of all addsS
 			$data['dynamic_view'] = 'allads/view_db';
        	$data['description'] = 'Insert add';

        	$this->load->view('templates/main_template', $data);
 			
		}
	}
    public function addPhoto(){
        //here validate the photo upload
        //on success load $data['dynamic_view'] = 'allads/view_db';
        //on fault load the add photo view again
    }
//update
	public function show_update_allads(){
       	$id = $_GET['id'];
        $data['allads_info'] = $this->allads_model->get_allads($id);
        $data['cities'] = $this->cities_model->get_all_cities();
		$data['types'] = $this->types_model->get_all_types();

       
        $data['dynamic_view'] = 'allads/update_allads_view';
        $data['description'] = 'Update add';

        $this->load->view('templates/main_template', $data);
 			
    }

    public function update_allads($id)
    {
       
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
		        
        if($this->form_validation->run() === FALSE)
        {
            $this->show_update_message($id);
        }
        else 
        {
            $this->allads_model->update_allads($id);
            echo "<p>Successfully updated a add in DB!</p>";
            $this->load->view('/allads/view_db');
        }

    }

//delete

   

    public function del_allads(){
        $id = $_GET['id'];
    	 $this->allads_model->delete_allads($id);
          echo "Successfully deleted a add from DB!";

          $this->load->view('/allads/view_db');
    }

}