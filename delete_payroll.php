<?php 
    include 'includes/autoloader.inc.php' ;
    
    $p_id = $_GET['p_id'];
    if(!empty($p_id)){
        $delPayroll = new Payrollcontr();
        $delPayroll->removePayroll($p_id);
        header("Location: show_all_payroll.php");
        echo "Payroll deleted";
    }
    else{
        echo "something went wrong";
    }

?>