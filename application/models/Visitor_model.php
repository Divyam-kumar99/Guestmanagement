<?php
defined ('BASEPATH') or exit ('No direct script access allowed');

class Visitor_model extends CI_model{

    function getvisitorbyphone($phone){
        $this->db->where('phone',$phone);  
        $this->db->order_by('created','DESC');      
        return $this->db->get('guest_employee_mapping')->row_array();
    }
    function getvisitors(){
        $this->db->select('guest_employee_mapping.*,employee.name as emp_name');
        $this->db->join('employee','employee.id=guest_employee_mapping.emp_id','left');
        $this->db->order_by('created');
        return $this->db->get('guest_employee_mapping')->result_array();
    }
    function update($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update("guest_employee_mapping",$formArray);
    }
    function getvisitorsbyid($id){
        $this->db->where('emp_id',$id);
        $this->db->where('status',0); //shows only those employee who are awaiting approval in notification
        $result['count']= $this->db->count_all_results('guest_employee_mapping');

        $this->db->where('emp_id',$id);
        $this->db->where('status',0);
        $this->db->order_by('created','desc');
        $result['visitors']= $this->db->get('guest_employee_mapping')->result_array();
        return $result;
    }
    function getvisitorsbyid1($id){
        $this->db->where('emp_id',$id);
        // $this->db->where('status',0);
        $this->db->order_by('created');
        return $this->db->get('guest_employee_mapping')->result_array();
        
    }
    function updatemeetingstatus($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('guest_employee_mapping',$formArray);
    }
    function getvisitorsreception(){
        $this->db->where('status',1); //shows only those employee who are awaiting approval in notification
        $result['count']= $this->db->count_all_results('guest_employee_mapping');

        $this->db->where('status',1);
        $this->db->order_by('created','desc');
        $result['visitors']= $this->db->get('guest_employee_mapping')->result_array();
        return $result;
    }

}
?>