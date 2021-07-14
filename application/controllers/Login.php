<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Login extends CI_controller{

    public function index(){
        $this->load->model('Admin_model');

        $this->load->library('form_validation');

        $this->load->view('Masteradmin/masterlogin');
    }
    //Master admin auth and login
    public function authenticate(){
        $this->load->model('Admin_model');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email' ,'required');
        $this->form_validation->set_rules('password', 'password' ,'required');

        if($this->form_validation->run()){
            $name=$this->input->post('email');
            $val=$this->Admin_model->getadminlogin($name);
            if(!empty($val)){
                $pass=$this->input->post('password');

                if($name==$val['email'] and $pass==$val['password']){
                    // echo "exit here"; exit();
                    $valArr['id']=$val['id'];
                    $valArr['email']=$val['email'];
                    $valArr['role']=$val['role'];
                    $valArr['name']=$val['name'];

                    if($valArr['role']==0){

                        $this->session->set_userdata('admin', $valArr);
                        redirect(base_url().'admin/Admin/home');
                    }else if($valArr['role']==1){
                        $this->session->set_userdata('employee', $valArr);
                        // redirect here to employee dashboard
                        redirect(base_url().'admin/employee');

                    }else{
                        $this->session->set_userdata('reception', $valArr);
                        // redirect here to receptionist dashboard
                        redirect(base_url().'admin/reception');

                    }
                }

                //if username and password do not match
                else{
                    $this->session->set_flashdata('fail','Wrong here username or password');
                    redirect(base_url().'Login/index');
                }

            }

            //if other admin try to access
            else{
                $this->session->set_flashdata('fail','Wrong here2 username or password');
                redirect(base_url().'Login/index');
            }
        }
        else{
            $this->session->set_flashdata('fail','Wrong test username or password');

            $this->load->view('Masteradmin/masterlogin');
        }
    }

}

?>