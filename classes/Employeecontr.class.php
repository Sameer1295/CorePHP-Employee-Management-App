<?php 
class Employeecontr extends Employee{
    public function hello($ename){
        $this->ename = $ename;
        echo $ename;
    }

    public function showAllEmployees(){
        $res = $this->getAllEmployee();
        return $res;
    }

    public function addEmployee($e_code,$e_name,$e_gender,$e_father_name,$e_mother_name,$e_dob,$e_designation,$e_payroll,$e_esic,$e_uan,$e_education,$e_marital_status,$e_adhaar,$e_address,$e_permanent_address,$e_pan_card,$e_bank_name,$e_branch_name,$e_account_name,$e_ifsc,$e_blood_group,$e_mobile_number,$e_body_mark){
        $this->setEmployee($e_code,$e_name,$e_gender,$e_father_name,$e_mother_name,$e_dob,$e_designation,$e_payroll,$e_esic,$e_uan,$e_education,$e_marital_status,$e_adhaar,$e_address,$e_permanent_address,$e_pan_card,$e_bank_name,$e_branch_name,$e_account_name,$e_ifsc,$e_blood_group,$e_mobile_number,$e_body_mark);
    }

    public function removeEmployee($e_id){
        $this->deleteEmployee($e_id);
    }

    public function showEmployeeById($emp_id){
        $res = $this->getEmployeeById($emp_id);
        return $res;
    }

    public function editEmployee($e_code,$e_name,$e_gender,$e_father_name,$e_mother_name,$e_dob,$e_designation,$e_payroll,$e_esic,$e_uan,$e_education,$e_marital_status,$e_adhaar,$e_address,$e_permanent_address,$e_pan_card,$e_bank_name,$e_branch_name,$e_account_number,$e_ifsc,$e_blood_group,$e_mobile_number,$e_body_mark,$e_id){
        $this->updateEmployee($e_code,$e_name,$e_gender,$e_father_name,$e_mother_name,$e_dob,$e_designation,$e_payroll,$e_esic,$e_uan,$e_education,$e_marital_status,$e_adhaar,$e_address,$e_permanent_address,$e_pan_card,$e_bank_name,$e_branch_name,$e_account_number,$e_ifsc,$e_blood_group,$e_mobile_number,$e_body_mark,$e_id);
    }

    public function showEmployeeByName($emp_name){
        $res = $this->getEmployeeByName($emp_name);
        return $res;
    }
    
}
?>