<?php 
class Usercontr extends User{
    public function addUser($userName, $password){
        $this->setUser($userName,$password);
    }
    public function checkUser($u_name,$u_pass){
        $res = $this->checkLogin($u_name,$u_pass);
        return $res;
    }
}

?>