<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Reception extends CI_controller{
    public function __construct(){
        parent::__construct();
        $result=$this->session->userdata('reception');
        
        if(empty($result)){
            $this->session->set_flashdata('fail','Session expired, kindly log in to continue');
            redirect(base_url().'login');
        }
    }
    function index (){
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $users=$this->Admin_model->getadmins();
        $data['users']=$users;
        $data['mainModule']="home";
        $name= $this->session->userdata('reception');
        $data['id']=$name['id'];
        $data['name']=$name['name'];
        $this->load->view('reception/dashboard', $data);

    }
    public function logout(){
        // echo "exit here"; exit();
        $this->session->unset_userdata('reception');
        redirect(base_url().'login');
    }
    public function profile($id){
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $user= $this->Admin_model->getadmin($id);
        $data['arr']=$user;
        $data['mainModule']="profile";
        $data['id']=$id;
        

        $this->form_validation->set_rules('name', 'name' ,'required');
        // $this->form_validation->set_rules('email', 'email' ,'required');
        $this->form_validation->set_rules('phone', 'phone' ,'required');
        $this->form_validation->set_rules('address', 'Address' ,'required');

        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

        if($this->form_validation->run()){
       
         
            $formArray=array();
            $formArray['name']=$this->input->post('name');
            // $formArray['email']=$this->input->post('email');
            $formArray['phone']=$this->input->post('phone');
            $formArray['address']=$this->input->post('address');
            // $formArray['password']=$this->input->post('password');
            // $formArray['role']=$this->input->post('status');

            $this->Admin_model->update($id, $formArray);

            $this->session->set_flashdata('success', 'Your details updated successfully!!!');
                redirect(base_url().'admin/reception');
                
            
        }
        else{
            //show errors
            // echo "exit"; exit();
            $this->load->view('reception/profile', $data);
        }
    }
    function visitor(){
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $users=$this->Admin_model->getadmins();
        $data['users']=$users;
        $data['mainModule']="home";
        $name= $this->session->userdata('reception');
        $data['id']=$name['id'];
        $data['name']=$name['name'];

        $this->form_validation->set_rules('phone', 'phone' ,'numeric|required|min_length[10]');
        $this->form_validation->set_rules('name', 'Name' ,'required');
        $this->form_validation->set_rules('address', 'Address' ,'required');
        $this->form_validation->set_rules('purpose', 'Purpose of Meeting' ,'required');
        $this->form_validation->set_rules('meet', 'Whom to meet' ,'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        if($this->form_validation->run()){
       
         
            $formArray=array();
            $formArray['phone']=$this->input->post('phone');
            $formArray['name']=$this->input->post('name');
            $formArray['address']=$this->input->post('address');
            $formArray['purpose']=$this->input->post('purpose');
            $formArray['emp_id']=$this->input->post('meet');
           

            $this->Admin_model->addvisitor($formArray);

            $this->session->set_flashdata('success', 'Meeting Request sent !!!');
                redirect(base_url().'admin/reception/index');
                
            
        }
        else{
            //show errors
            // echo "exit"; exit();
            $this->load->view('reception/dashboard', $data);
        }
    }
    function getvisitor(){ //ajax call to get visitor by phone no.
        $this->load->model('Visitor_model');
        $phone=$this->input->post('phone');
        //  $phone= 9658012616;
        $user=$this->Visitor_model->getvisitorbyphone($phone);
        echo json_encode($user);
        // print_r( $user ) ;
    }
    public function meeting(){
        $this->load->model('Visitor_model');
        $user=$this->session->userdata('reception');
        $data['id']=$user['id'];
        $data['mainModule']="meeting";
        $data['visitors']=$this->Visitor_model->getvisitors();
        // echo "<pre>";
        // print_r($data['visitors']);
        // echo "</pre>";
        // exit();
        $this->load->view('reception/meetings',$data);
    }
    public function modify($id){
        $this->load->model("Visitor_model",'vs');
        $formArray['status']=3;
        $this->vs->update($id,$formArray);
        $this->session->set_flashdata('success','Meeting closed Successfully..!!!!');
        redirect(base_url('admin/reception/meeting'));
    }
    public function notification(){
        $this->load->model('Visitor_model');
        
        $result=array();
        $result=$this->Visitor_model->getvisitorsreception();
        echo json_encode($result);
        // print_r($result);
        
    }
}

?>