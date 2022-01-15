<?php 
    include 'includes/autoloader.inc.php' ;
    
    $emp_id = $_GET['e_id'];
    if(!empty($emp_id)){
        $delEmp = new Employercontr();
        $delEmp->removeEmployer($emp_id);
        header("Location: show_all_employers.php");
        echo "Employee deleted";
    }
    else{
        echo "something went wrong";
    }

?>