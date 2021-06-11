<?php
ob_start();
class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->model('General_model');
        $this->load->helper('url');
        $this->load->helper('string');
        //$this->load->helper('custom');
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('apanel', 'refresh');
        }

        //Admin Access
        
    }

	public function index()
	{
	    $where=array(
	        'trash'=>0
	        );
		$data['datatable']=$this->General_model->show_data_id('tbl_user','','','get','',$where);
        
        $data['title']="User || List";
		$this->load->view('apanel/header',$data);
		$this->load->view('apanel/userlist');
		$this->load->view('apanel/footer');
	}


	//========================= Edit Admin =================================
	public function user_edit()
	{
	    $id=base64_decode($this->input->get('data',true));
	    $where=array(
	        'trash'=>0
	        );
		$data['user_info']=$this->General_model->show_data_id('tbl_user',$id,'user_id','get','',$where);
        //$data['user']=$query; 
		$data['title']="User || Edit";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/useredit');
        $this->load->view('apanel/footer');
	}
    public function user_edit_post($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('active', 'Email', 'required');
        //$this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  update failed');
          redirect($_SERVER['HTTP_REFERER']);

        }else{
            
            
        
        $query= $this->General_model->show_data_id('tbl_user',$id,'user_id','update',$this->input->post());
    
if ($query) 
	    {   
		 $this->session->set_flashdata('message', 'Data successfully updated');
	    }else{
            $this->session->set_flashdata('error', 'Data update failed');
        }
       redirect($_SERVER['HTTP_REFERER']);
        }  
    }

public function user_add()
    {
        
       
        $data['title']="User || Registration";
        $this->load->view('apanel/header',$data);
        $this->load->view('apanel/user_add');
        $this->load->view('apanel/footer');
    }
    public function user_add_post()
    {
       

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('error', 'Data  save failed');
           redirect('apanel/user/user_add');

        }else{
            $email=$this->input->post('email');
        $RowCount= $this->General_model->RowCount('user_table','email',$email);
        if($RowCount>0){
            $this->session->set_flashdata('error', 'Email already exist!');

       redirect('apanel/user/user_add'); 
        }else{
            // $datalist = array( 
            //     'name'      => $this->input->post('name'),
            //     'email'      => $this->input->post('email'),
            //     'phone'     => $this->input->post('phone'),
            //     'status'   => $this->input->post('status'),
            //      'entry_date'   =>date('Y-m-d')
            //     'status'        => $this->input->post('status'),
            // );

            $_POST['entry_date']=date('Y-m-d');
      //$jj=formData('k');
      //print_r($jj);
      //exit();
        
    $query= $this->General_model->show_data_id('user_table','','','insert',$this->input->post());
    $this->session->set_flashdata('message', 'Data successfully Saved');

       redirect('apanel/user/user_add'); 
        } 
        } 
    }
	//========================= End Edit Admin =================================

	public function get_useremail(){
        //echo $email;
        $email=$this->input->post('email');
       echo $query= $this->General_model->RowCount('user_table','email',$email);
    }

	//========================= Delete Admin =================================
    public function user_delete($id)
     { 
         $data_field=array(
             'trash'=>1
             );
	    $query=$this->General_model->show_data_id('tbl_user',$id,'user_id','update',$data_field);

	    if ($query) 
	    {   
		    //$data1['admin_image']=base_url().'uploads/admin/'.$query[0]->admin_image;
		    //@unlink(str_replace(base_url(),'',$query[0]->admin_image));
            $this->session->set_flashdata('message', 'Data successfully Deleted');
	    }else{
            $this->session->set_flashdata('error', 'Data delete failed');
        }

        redirect('apanel/user');
	
	 }
    //=========================End Delete Admin ================================= 
}

