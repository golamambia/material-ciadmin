<?php
ob_start();
class Category extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('apanel/Model_users');
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('apanel', 'refresh');
        }
      
    }

    public function index()
    {   
       
        $this->category();
      } 

    
    
    
    public function category(){ 

       $where=array(
           'service_isdelete'=>0
           );
        $data['hm_product']=$this->General_model->show_data_id('service','','','get','',$where);
       
        $data['title']="Home || category";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/category');
        $this->load->view('apanel/footer');

    }
    
    
    public function product_post()
    {

        $this->form_validation->set_rules('service_name', 'Name', 'required');
        $this->form_validation->set_rules('service_description', 'description', 'required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/category/'); 
           
        }else{
            if(!empty($_FILES['cat_file']['name'])){
            $new_name = time().$_FILES["cat_file"]['name'];
            $config = array(
                'upload_path' => "uploads/",
                'upload_url' => base_url() . "uploads/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'file_name'=>$new_name
            );

            $this->load->library('upload', $config);
            $this->upload->do_upload("cat_file");
            $_POST['service_image']=$new_name;
        }
            $_POST['service_entry_date']=date('Y-m-d');
            
        $query= $this->General_model->show_data_id('service','','','insert',$this->input->post());
    $this->session->set_flashdata('message', 'Data successfully Saved');
    
    redirect('apanel/category'); 
       
        } 
    }
    
   public function product_edit($id)
    {
   

        $this->form_validation->set_rules('service_name', 'Name', 'required');
        $this->form_validation->set_rules('service_description', 'description', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
           redirect('apanel/category'); 
        }else{

            if(!empty($_FILES['cat_file']['name'])){
            $new_name = time().$_FILES["cat_file"]['name'];
            $config = array(
                'upload_path' => "uploads/",
                'upload_url' => base_url() . "uploads/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'file_name'=>$new_name
            );

            //$this->load->library('upload', $config);
           // $this->upload->do_upload("cat_file");
            $_POST['service_image']=$new_name;
 $location = "uploads/".$new_name;
             // Compress Image
    $this->compressImage($_FILES['cat_file']['tmp_name'],$location,50);

        }


        $query= $this->General_model->show_data_id('service',$id,'service_id','update',$this->input->post());
    $this->session->set_flashdata('message', 'Data successfully Updated');
    
    redirect('apanel/category'); 
       
        } 
    }

public function product_delete($id)
     { 
         $data=array(
             'service_isdelete'=>1
             );
        $query=$this->General_model->show_data_id('service',$id,'service_id','update',$data);

        if ($query) 
        {   
            //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
            //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
        }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/category');
    
     }
     
   // Compress image
function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}
     
     

}

