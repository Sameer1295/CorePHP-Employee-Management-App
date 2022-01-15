<?php 
class Employer extends Database{
private $table = 'employers_table';

    protected function getAllEmployers(){
        $sql = "SELECT * FROM .$this->table";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;
    }

    protected function setEmployer($emp_name,$emp_add,$emp_contact,$emp_pf,$emp_esic,$emp_gst){
        $sql = "INSERT INTO $this->table(employer_name,employer_address,employer_contact_number,employer_pf_number,employer_esic_number,employer_gst) 
                                        values(:emp_name,:emp_add,:emp_contact,:emp_pf,:emp_esic,:emp_gst)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':emp_name',$emp_name);
        $stmt->bindParam(':emp_add',$emp_add);
        $stmt->bindParam(':emp_contact',$emp_contact);
        $stmt->bindParam(':emp_pf',$emp_pf);
        $stmt->bindParam(':emp_esic',$emp_esic);
        $stmt->bindParam(':emp_gst',$emp_gst);
        $stmt->execute();
    }

    protected function editEmployer($emp_name,$emp_add,$emp_contact,$emp_pf,$emp_esic,$emp_gst,$emp_id){
        $sql = "UPDATE $this->table employer_name=:emp_name,
                                        employer_address=:emp_add,
                                        employer_contact_number=:emp_contact,
                                        employer_pf_number=:emp_pf,
                                        employer_esic_number=:emp_esic,
                                        employer_gst=:emp_gst
                                        WHERE emp_id=:emp_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':emp_name',$emp_name);
        $stmt->bindParam(':emp_add',$emp_add);
        $stmt->bindParam(':emp_contact',$emp_contact);
        $stmt->bindParam(':emp_pf',$emp_pf);
        $stmt->bindParam(':emp_esic',$emp_esic);
        $stmt->bindParam(':emp_gst',$emp_gst);
        $stmt->bindParam(':emp_id',$emp_id);
        $stmt->execute();
    }

    protected function deleteEmployer($employer_id){
        $sql = "DELETE FROM $this->table WHERE employer_id=:emp_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':emp_id',$employer_id);
        $stmt->execute();
    }

    protected function getEmployerById($emp_id){
        $sql = "SELECT * FROM $this->table WHERE employer_id=:emp_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':emp_id',$emp_id);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;        
    }

    protected function getEmployerByName($emp_name){
        $sql = "SELECT * FROM $this->table WHERE employer_name LIKE concat('%',:emp_name,'%')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':emp_name',$emp_name);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;
    }

    
}
?>