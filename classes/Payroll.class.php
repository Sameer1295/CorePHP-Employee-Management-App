<?php 
class Payroll extends Database{
private $table = 'payroll_table';

    protected function getAllPayroll(){
        $sql = "SELECT * FROM .$this->table";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;
    }

    protected function setPayroll($employee_id,$employer_id,$employee_pf_number,$employee_esic_number,$joining_date,$leaving_date){
        $sql = "INSERT INTO $this->table(employee_id,employer_id,employee_pf_number,employee_esic_number,joining_date,leaving_date) 
                                        values(:employee_id,:employer_id,:emp_pf_number,:emp_esic_number,:joining_date,:leaving_date)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':employee_id',$employee_id);
        $stmt->bindParam(':employer_id',$employer_id);
        $stmt->bindParam(':emp_pf_number',$employee_pf_number);
        $stmt->bindParam(':emp_esic_number',$employee_esic_number);
        $stmt->bindParam(':joining_date',$joining_date);
        $stmt->bindParam(':leaving_date',$leaving_date);
        $stmt->execute();
    }

    protected function editPayroll($employee_id,$employer_id,$employee_pf_number,$employee_esic_number,$joining_date,$leaving_date,$payroll_id){
        $sql = "UPDATE $this->table SET employee_id=:employee_id,
                                        employer_id=:employer_id,
                                        employee_pf_number=:emp_pf_number,
                                        employee_esic_number=:emp_esic_number,
                                        joining_date=:joining_date,
                                        leaving_date=:leaving_date
                                        WHERE payroll_id=:p_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':employee_id',$employee_id);
        $stmt->bindParam(':employer_id',$employer_id);
        $stmt->bindParam(':emp_pf_number',$employee_pf_number);
        $stmt->bindParam(':emp_esic_number',$employee_esic_number);
        $stmt->bindParam(':joining_date',$joining_date);
        $stmt->bindParam(':leaving_date',$leaving_date);
        $stmt->bindParam(':p_id',$payroll_id);
        $stmt->execute();
    }

    protected function deletePayroll($payroll_id){
        $sql = "DELETE FROM $this->table WHERE payroll_id=:p_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':p_id',$payroll_id);
        $stmt->execute();
    }

    protected function getPayrollById($payroll_id){
        $sql = "SELECT * FROM $this->table WHERE payroll_id=:p_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':p_id',$payroll_id);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;        
    }

    protected function getAllPayrollWithDetail(){
        $sql = "SELECT a.*,b.employee_name,c.employer_name 
                FROM $this->table a 
                    INNER JOIN employees_table b ON a.employee_id = b.employee_id
                    INNER JOIN employers_table c ON a.employer_id = c.employer_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;
    }
    
    protected function getPayrollByName($emp_name){
        $sql = "SELECT a.*,b.employee_name,c.employer_name 
                FROM $this->table a 
                    INNER JOIN employees_table b ON a.employee_id = b.employee_id
                    INNER JOIN employers_table c ON a.employer_id = c.employer_id
                WHERE b.employee_name LIKE concat('%',:emp_name,'%') OR c.employer_name LIKE concat('%',:emp_name,'%')";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':emp_name',$emp_name);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;        
    }
}
?>