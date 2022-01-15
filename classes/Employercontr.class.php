<?php 
class Employercontr extends Employer{
    public function showAllEmployers(){
        $res = $this->getAllEmployers();
        return $res;
    }

    public function addEmployer($e_name,$e_address,$e_contact_number,$e_pf_number,$e_esic_number,$e_gst_number){
        $this->setEmployer($e_name,$e_address,$e_contact_number,$e_pf_number,$e_esic_number,$e_gst_number);
    }

    public function removeEmployer($e_id){
        $this->deleteEmployer($e_id);
    }

    public function showEmployerById($emp_id){
        $res = $this->getEmployerById($emp_id);
        return $res;
    }

    public function editEmployer($e_name,$e_address,$e_contact_number,$e_pf_number,$e_esic_number,$e_gst_number,$e_id){
        $this->updateEmployer($e_name,$e_address,$e_contact_number,$e_pf_number,$e_esic_number,$e_gst_number,$e_id);
    }

    public function showEmployerByName($emp_name){
        $res = $this->getEmployerByName($emp_name);
        return $res;
    }
}
?>