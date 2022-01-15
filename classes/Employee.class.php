<?php 
class Employee extends Database{
private $table = 'employees_table';

    protected function getAllEmployee(){
        $sql = "SELECT * FROM .$this->table";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;
    }

    protected function setEmployee($e_code,$e_name,$e_gender,$e_father_name,$e_mother_name,$e_dob,$e_designation,$e_payroll,$e_esic,$e_uan,$e_education,$e_marital_status,$e_adhaar,$e_address,$e_permanent_address,$e_pan_card,$e_bank_name,$e_branch_name,$e_account_number,$e_ifsc,$e_blood_group,$e_mobile_number,$e_body_mark){
        $sql = "INSERT INTO .$this->table(employee_code,employee_name,employee_gender,employee_father_name,employee_mother_name,employee_dob,employee_designation,employee_payroll,employee_esic,employee_uan,employee_education,employee_marital_status,employee_adhaar,employee_address,employee_permanent_address,employee_pan_card,employee_bank_name,employee_branch_name,employee_account_number,employee_ifsc_code,employee_blood_group,employee_mobile_number,employee_body_mark) 
                                VALUES(:e_code,:e_name,:e_gender,:e_father_name,:e_mother_name,:e_dob,:e_designation,:e_payroll,:e_esic,:e_uan,:e_education,:e_marital_status,:e_adhaar,:e_address,:e_permanent_address,:e_pan_card,:e_bank_name,:e_branch_name,:e_account_number,:e_ifsc,:e_blood_group,:e_mobile_number,:e_body_mark)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':e_code',$e_code);
        $stmt->bindParam(':e_name',$e_name);
        $stmt->bindParam(':e_gender',$e_gender);
        $stmt->bindParam(':e_father_name',$e_father_name);
        $stmt->bindParam(':e_mother_name',$e_mother_name);
        $stmt->bindParam(':e_dob',$e_dob);
        $stmt->bindParam(':e_designation',$e_designation);
        $stmt->bindParam(':e_payroll',$e_payroll);
        $stmt->bindParam(':e_esic',$e_esic);
        $stmt->bindParam(':e_uan',$e_uan);
        $stmt->bindParam(':e_education',$e_education);
        $stmt->bindParam(':e_marital_status',$e_marital_status);
        $stmt->bindParam(':e_adhaar',$e_adhaar);
        $stmt->bindParam(':e_address',$e_address);
        $stmt->bindParam(':e_permanent_address',$e_permanent_address);
        $stmt->bindParam(':e_pan_card',$e_pan_card);
        $stmt->bindParam(':e_bank_name',$e_bank_name);
        $stmt->bindParam(':e_branch_name',$e_branch_name);
        $stmt->bindParam(':e_account_number',$e_account_number);
        $stmt->bindParam(':e_ifsc',$e_ifsc);
        $stmt->bindParam(':e_blood_group',$e_blood_group);
        $stmt->bindParam(':e_mobile_number',$e_mobile_number);
        $stmt->bindParam(':e_body_mark',$e_body_mark);
        $stmt->execute();
    }

    protected function deleteEmployee($emp_id){
        $sql = "DELETE FROM $this->table WHERE employee_id=:emp_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':emp_id',$emp_id);
        $stmt->execute();
    }

    protected function getEmployeeById($emp_id){
        $sql = "SELECT * FROM $this->table WHERE employee_id=:emp_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':emp_id',$emp_id);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;        
    }

    protected function updateEmployee($e_code,$e_name,$e_gender,$e_father_name,$e_mother_name,$e_dob,$e_designation,$e_payroll,$e_esic,$e_uan,$e_education,$e_marital_status,$e_adhaar,$e_address,$e_permanent_address,$e_pan_card,$e_bank_name,$e_branch_name,$e_account_number,$e_ifsc,$e_blood_group,$e_mobile_number,$e_body_mark,$e_id){
        $sql = "UPDATE $this->table SET employee_code=:e_code,employee_name=:e_name,employee_gender=:e_gender,employee_father_name=:e_father_name,employee_mother_name=:e_mother_name,employee_dob=:e_dob,employee_designation=:e_designation,employee_payroll=:e_payroll,employee_esic=:e_esic,employee_uan=:e_uan,employee_education=:e_education,employee_marital_status=:e_marital_status,employee_adhaar=:e_adhaar,employee_address=:e_address,employee_permanent_address=:e_permanent_address,employee_pan_card=:e_pan_card,employee_bank_name=:e_bank_name,employee_branch_name=:e_branch_name,employee_account_number=:e_account_number,employee_ifsc_code=:e_ifsc_code,employee_blood_group=:e_blood_group,employee_mobile_number=:e_mobile_number,employee_body_mark=:e_body_mark 
                        WHERE employee_id=:e_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':e_code',$e_code);
        $stmt->bindParam(':e_name',$e_name);
        $stmt->bindParam(':e_gender',$e_gender);
        $stmt->bindParam(':e_father_name',$e_father_name);
        $stmt->bindParam(':e_mother_name',$e_mother_name);
        $stmt->bindParam(':e_dob',$e_dob);
        $stmt->bindParam(':e_designation',$e_designation);
        $stmt->bindParam(':e_payroll',$e_payroll);
        $stmt->bindParam(':e_esic',$e_esic);
        $stmt->bindParam(':e_uan',$e_uan);
        $stmt->bindParam(':e_education',$e_education);
        $stmt->bindParam(':e_marital_status',$e_marital_status);
        $stmt->bindParam(':e_adhaar',$e_adhaar);
        $stmt->bindParam(':e_address',$e_address);
        $stmt->bindParam(':e_permanent_address',$e_permanent_address);
        $stmt->bindParam(':e_pan_card',$e_pan_card);
        $stmt->bindParam(':e_bank_name',$e_bank_name);
        $stmt->bindParam(':e_branch_name',$e_branch_name);
        $stmt->bindParam(':e_account_number',$e_account_number);
        $stmt->bindParam(':e_ifsc_code',$e_ifsc);
        $stmt->bindParam(':e_blood_group',$e_blood_group);
        $stmt->bindParam(':e_mobile_number',$e_mobile_number);
        $stmt->bindParam(':e_body_mark',$e_body_mark);
        $stmt->bindParam(':e_id',$e_id);
        $stmt->execute();
    }

    protected function getEmployeeByName($emp_name){
        $sql = "SELECT * FROM $this->table WHERE employee_name LIKE concat('%',:emp_name,'%')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':emp_name',$emp_name);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;
    }
}
?>