<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Employee extends CI_controller{
    public function __construct(){
        parent::__construct();
        $result=$this->session->userdata('employee');
        
        if(empty($result)){
            $this->session->set_flashdata('fail','Session expired, kindly log in to continue');
            redirect(base_url().'login');
        }
    }
    function index (){
        $data['mainModule']="home";
        $name= $this->session->userdata('employee');
        $data['id']=$name['id'];
        $data['name']=$name['name'];
        $this->load->view('employee/dashboard', $data);

    }
    public function logout(){
        // echo "exit here"; exit();
        $this->session->unset_userdata('employee');
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
                redirect(base_url().'admin/employee/index');
                
            
        }
        else{
            //show errors
            // echo "exit"; exit();
            $this->load->view('employee/profile', $data);
        }
    }
    function visitor(){
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        // $users=$this->Admin_model->getadmins();
        // $data['users']=$users;
        $data['mainModule']="meeting";
        $name= $this->session->userdata('employee');
        $data['id']=$name['id'];
        $data['name']=$name['name'];

        $this->form_validation->set_rules('phone', 'phone' ,'numeric|required|min_length[10]');
        $this->form_validation->set_rules('name', 'Name' ,'required');
        $this->form_validation->set_rules('address', 'Address' ,'required');
        $this->form_validation->set_rules('purpose', 'Purpose of Meeting' ,'required');
        $this->form_validation->set_rules('date', 'Schedule of Meeting' ,'required');
        
        // $this->form_validation->set_rules('meet', 'Whom to meet' ,'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
        if($this->form_validation->run()){
       
         
            $formArray=array();
            $formArray['phone']=$this->input->post('phone');
            $formArray['name']=$this->input->post('name');
            $formArray['address']=$this->input->post('address');
            $formArray['purpose']=$this->input->post('purpose');
            $formArray['created']=$this->input->post('date');
            $formArray['emp_id']=$data['id'];
            $formArray['status']=2;
           

            $this->Admin_model->addvisitor($formArray);

            $this->session->set_flashdata('success', 'Meeting Request sent !!!');
                redirect(base_url().'admin/employee/index');
                
            
        }
        else{
            //show errors
            // echo "exit"; exit();
            $this->load->view('employee/meeting', $data);
        }
    }
    function getvisitor(){
        $this->load->model('Visitor_model');
        $phone=$this->input->post('phone');
        //  $phone= 9658012616;
        $user=$this->Visitor_model->getvisitorbyphone($phone);
        echo json_encode($user);
        // print_r( $user ) ;
    }
    public function notification(){
        $this->load->model('Visitor_model');
        $user= $this->session->userdata('employee');
        $data['id']=$user['id'];
        
        $result=array();
        $result=$this->Visitor_model->getvisitorsbyid($data['id']);
        echo json_encode($result);
        // print_r($result);
        
    }
    function meeting($id){
        $this->load->model('Visitor_model');
        $data['id']=$id;
        $data['mainModule']="meeting";
        $data['visitors']=$this->Visitor_model->getvisitorsbyid1($id);
        // print_r($data);exit();
        $this->load->view('employee/allmeetings',$data);
    }
    function update(){ //ajax called to change status
        $this->load->model("Visitor_model",'vs');
        $formArray['status']=$this->input->post('status');
        $id=$this->input->post('id');
        if($formArray['status']==1||$formArray['status']==3||$formArray['status']==2){
            $this->vs->updatemeetingstatus($id,$formArray);
        }
        print_r(json_encode("success"));

    }
    function reschedule($id){ //to reschedule a meeting
        // echo"reschedule"; exit();
        $user= $this->session->userdata('employee');
        $this->load->model("Visitor_model",'vs');
        $this->load->library('form_validation');
        $formArray['status']=2;
        $formArray['created']=$this->input->post('date');          
        // print_r($formArray);echo "$id";exit();
        $this->vs->updatemeetingstatus($id,$formArray);
        $this->session->set_flashdata('success', 'Meeting Rescheduled Successfully !!!');
        redirect(base_url('admin/employee/meeting/').$user['id']);

    }
}

?>