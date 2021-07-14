<?php
class Admin_model extends CI_model{
    public function add($formArray){
        $this->db->insert('employee', $formArray);
    }

    public function getadmins(){
        $result=$this->db->get('employee')->result_array();
        return $result;
    }

    public function getadmin($id){
        $this->db->where('id', $id);
        return $this->db->get('employee')->row_array();
        
    }
    public function getadminlogin($id){
        $this->db->where('email', $id);
        return $this->db->get('employee')->row_array();
        
    }
    public function update($id, $formArray){
        $this->db->where('id',$id);
        $this->db->update('employee', $formArray);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('employee');
    }

    public function addvisitor($formArray){
        $this->db->insert('guest_employee_mapping',$formArray);
    }
  
}

?>