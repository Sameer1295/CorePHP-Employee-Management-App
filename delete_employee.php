<?php 
    include 'includes/autoloader.inc.php' ;
    
    $emp_id = $_GET['e_id'];
    if(!empty($emp_id)){
        $delEmp = new Employeecontr();
        $delEmp->removeEmployee($emp_id);
        header("Location: index.php");
        echo "Employee deleted";
    }
    else{
        echo "something went wrong";
    }

?>