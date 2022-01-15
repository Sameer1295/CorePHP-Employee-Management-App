<?php 
class Payrollcontr extends Payroll{
    public function showAllPayroll(){
        $res = $this->getAllPayroll();
        return $res;
    }

    public function addPayroll($employee_id,$employer_id,$employee_pf_number,$employee_esic_number,$joining_date,$leaving_date){
        $this->setPayroll($employee_id,$employer_id,$employee_pf_number,$employee_esic_number,$joining_date,$leaving_date);
    }

    public function removePayroll($p_id){
        $this->deletePayroll($p_id);
    }

    public function showPayrollById($p_id){
        $res = $this->getPayrollById($p_id);
        return $res;
    }

    public function updatePayroll($employee_id,$employer_id,$employee_pf_number,$employee_esic_number,$joining_date,$leaving_date,$p_id){
        $this->editPayroll($employee_id,$employer_id,$employee_pf_number,$employee_esic_number,$joining_date,$leaving_date,$p_id);
    }

    public function showPayrollByName($emp_name){
        $res = $this->getPayrollByName($emp_name);
        return $res;
    }

    public function showAllPayrollWithDetail(){
        $res = $this->getAllPayrollWithDetail();
        return $res;      
    }
}
?>