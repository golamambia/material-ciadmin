<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
header("Content-Type: application/json");

class MenuController extends CI_Controller {
     public function __construct()
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
        $this->load->model('Restaurant_model');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('session');
         
    }
	public function book_table(){
    $dataList = (array)json_decode(file_get_contents('php://input',true)); //Form Data
    $post['bt_date'] =$dataList['bt_date'];
    $post['bt_time'] =$dataList['bt_time'];
    $post['bt_guest'] =$dataList['bt_guest'];
    $post['bt_name'] =$dataList['bt_name'];
    $post['bt_email'] =$dataList['bt_email'];
    $post['bt_phone'] =$dataList['bt_phone'];
    $post['bt_subject'] =$dataList['bt_subject'];
    $post['bt_entryDate'] = date('Y-m-d');
      $post['bt_createdAt'] = time();
      $post['bt_createdBy'] = 0;
      $query = $this->General_model->show_data_id('book_table', '', '', 'insert', $post);
      if ($query > 0) {

        $row = $this->db->select("CONCAT( 'F-', IF(LENGTH(bt_id)>6,bt_id, LPAD(bt_id,7,'0')) ) as bookinno")->where('bt_id', $query)->get('book_table')->row();
       
        if ($row) {
          $this->db->update('book_table', array('booking_no' => $row->bookinno), array('bt_id' => $query));
 
          //$this->session->set_flashdata('btmessage', 'Thankyou for your booking.');

          $mail_body = '<p>Hello ' . $dataList['bt_name'] . '</p>';
          $admin_mail = '<p>Hello admin, </br> You have a request for a table booking. Please check bellow details.</p>';
          $mail_body .= '<p>Thankyou for booking table we will contact you very soon.</p>';
          $body = '
          <p>Booking No: '.$row->bookinno.'</p>
          <p>Date: ' . $dataList["bt_date"] . '<br>
          Time: ' . date('h:i A', strtotime($dataList["bt_date"] . " " . $dataList["bt_time"])) . '<br>
          No of Guest: ' . $dataList["bt_guest"] . '<br>
          Name: ' . $dataList["bt_name"] . '<br>
          Email: ' . $dataList["bt_email"] . '<br>
          Phone: ' . $dataList["bt_phone"] . '<br>
          Subject: ' . $dataList["bt_subject"] . '<br> </p>';

          $admin_mail .= $body;
          $mail_body .= $body;

          customSmtpMailSend($dataList["bt_email"], 'Table booking confirmation', $mail_body);
          customSmtpMailSend(EMAIL, 'Request for table booking', $admin_mail);
          $dataReturn['status']=1;
        } else {
         $dataReturn['status']=0;
        }
      } else {
       $dataReturn['status']=0;
      }
      echo json_encode($dataReturn);
  }
	public function item_list()
    {
      $dataList = (array)json_decode(file_get_contents('php://input',true)); //Form Data
        $category_type=$dataList['mainMenuId'];
        $search=$dataList['search'];
         
$this->db->from('restaurant_menu');
$this->db->where('isDelete','0');
if($category_type>0){
  $this->db->where('rescatid',$category_type);
}
if($search){
  $this->db->like('menu_name',$search);
}
$this->db->order_by('rand()');
$menu_list=$this->db->get()->result();
         
          $data['menu_list']=$menu_list;
        
        echo json_encode($data);

    }
public function main_menu(){
	$where4 = array(
      'isDelete' => 0,
    );
    $data['main_category'] = $this->General_model->show_data_id('restaurant_category', '', '', 'get', '', $where4);
     echo json_encode($data);
}
public function home_item_list()
    {
                 
$this->db->from('restaurant_menu');
$this->db->where('isDelete','0');
$this->db->where('menu_image  is  NOT NULL', NULL, FALSE);
$this->db->order_by('rand()');
//$this->db->limit(3);
$menu_list=$this->db->get()->result();

        $data['menu_list']=$menu_list;
        
        echo json_encode($data);

    }

    public function gallery()
    {
      $url=base_url().'uploads/gallery/';
    $this->db->select('*,"'.$url.'" as img_url');             
$this->db->from('hp_gallery');
$this->db->where('sl_isdelete','0');
$this->db->where('sl_image  is  NOT NULL', NULL, FALSE);
$this->db->order_by('rand()');
//$this->db->limit(3);
$gallery_list=$this->db->get()->result();

        $data['gallery_list']=$gallery_list;
        
        echo json_encode($data);

    }

     public function menu()
    {
        $data1=$this->db->query("select * from restaurant_menu where isDelete='0' and rescatid=1 and menu_image!='' ORDER BY rand(), menu_name ASC LIMIT 5 ")->result();
        $data2=$this->db->query("select * from restaurant_menu where isDelete='0' and rescatid=2 and menu_image!='' ORDER BY rand(), menu_name ASC LIMIT 5 ")->result();
        $data3=$this->db->query("select * from restaurant_menu where isDelete='0' and rescatid=3 and menu_image!='' ORDER BY rand(), menu_name ASC LIMIT 5 ")->result();
        $data['main_menu']=array_merge($data1,$data2,$data3);
       echo json_encode($data);

    }

}