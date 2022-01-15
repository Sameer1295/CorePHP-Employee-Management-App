<?php 
class User extends Database{
    private $table = 'user_table';

    protected function setUser($u_name,$u_pass){
        $sql = "INSERT INTO $this->table(user_name,user_password) VALUES(:user_name,:user_password)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':user_name',$u_name);
        $stmt->bindParam(':user_password',$u_pass);
        $stmt->execute();
    }

    protected function checkLogin($u_name,$u_pass){
        $sql = "SELECT * FROM $this->table WHERE user_name =:u_name AND user_password =:u_pass";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':u_name',$u_name);
        $stmt->bindParam(':u_pass',$u_pass);
        $stmt->execute();

        $res = $stmt->fetchAll();
        return $res;
    }
}

?>