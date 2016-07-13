<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                
                //$this->load->helper(array('form', 'url'));
        }

        public function index()
        {
               //$data['dynamic_view'] = 'uploads/upload_form';
               // $data['error'] = $param;
                //$this->load->view('templates/main_template', $data);
                $this->load->view('uploads/upload_form', array('error' => ' ' ));//zarejda view s formata
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

                        $this->index($error);

                        //$this->load->view('uploads/upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data('file_name'));

                        $this->load->view('uploads/success_upload', $data);

                       // $data['upload_data'] = $this->upload->data('file_name');
                       // $data['dynamic_view'] = 'uploads/success_upload';                     
                    //   $this->load->view('templates/main_template', $data);
                }
        }

        function add_image() {
            //validate form input
                $this->form_validation->set_rules('file_name', 'File Name', 'required|xss_clean');
               
                $this->form_validation->set_rules('file_path', 'File Path ', 'callback__image_upload');
               

                if ($this->form_validation->run() == true)
                {       


           $config['upload_path'] = './uploads/';
         $config['allowed_types'] = 'gif|jpg|png';
         $config['max_size']    = '1000000';
         

         $this->load->library('upload', $config);
         $field_name = "field_name";
         if ( ! $this->upload->do_upload($field_name))
                {
         $error = array('error' => $this->upload->display_errors());

                    $this->load->view('admin/add_image', $error);
                    }
    else {

                $image_path = $this->upload->data();
            	$data = array(
                'filename'      => $this->input->post('filename'),
                'fullpath'      =>    $image_path[full_path]
                
            );
            print_r($data);

            $this->db->insert('photos', $data);
            $this->session->set_flashdata('message', "<p>Photo added successfully.</p>");

            redirect(base_url().'index.php/admin/hotel_controller/index');
           }

}


}
}