<?php 
include 'includes/autoloader.inc.php' ;
session_start();
if(isset(($_SESSION['u_name']))){
    $p_id = $_GET['p_id'];
    $obj3 = new Payrollcontr();
    $result = $obj3->showPayrollById($p_id);
    if(!empty($p_id)){
        $obj = new Employercontr;
        $resEmployer = $obj->showAllEmployers();
        $obj2 = new Employeecontr;
        $resEmployee = $obj2->showAllEmployees();
        if(isset($_POST['edit_payroll'])){
        $employee_id = $_POST['employee_id'];
        $employer_id = $_POST['employer_id'];
        $employee_pf_number = $_POST['employee_pf_number'];
        $employee_esic_number = $_POST['employee_esic_number'];
        $joining_date = $_POST['joining_date'];
        $leaving_date = $_POST['leaving_date'];
        $obj4 = new Payrollcontr();
        $res = $obj4->updatePayroll($employee_id,$employer_id,$employee_pf_number,$employee_esic_number,$joining_date,$leaving_date,$p_id);
        header("Location: show_all_payroll.php");
        echo "Payroll updated";
        }
    }

        
}else{
    header("Location: user_login.php");
}    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://use.fontawesome.com/1039931e35.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Home page</title>
</head>
<body>
<?php require 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <?php include 'sidebar.php'; ?>
            </div>
            <div class="col-lg-9 col-md-9">
            <?php if(empty($result)): ?>
                <p class="alert-danger">No Payroll found</p>
            <?php endif ?>
            <?php if(!empty($result)): ?>
                <?php for($i = 0;$i < count($result);$i++): ?>
                <form action="" method="POST">
                <h2>Edit Payroll</h2>
                <p class="font-weight-bold">Payroll Details</p>
                <!-- dpulicate filed -->
                <div class="form-group">
                    <label for="employee">Employee:</label>
                    <select class="form-control" name="employee_id" id="sel1">
                        <option value="0">Select Employee</option>
                        <?php for($i = 0; $i < count($resEmployee);$i++): ?>
                        <option value="<?php echo $resEmployee[$i]['employee_id']; ?>" <?php if($resEmployee[$i]['employee_id'] == $result[0]['employee_id']){ echo "selected"; } ?>><?php echo $resEmployee[$i]['employee_name']; ?></option>
                        <?php endfor ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="employee">Employer:</label>
                    <select class="form-control" name="employer_id" id="sel1">
                        <option value="0">Select Employer</option>
                        <?php for($j = 0; $j < count($resEmployer);$j++): ?>
                        <option value="<?php echo $resEmployer[$j]['employer_id']; ?>" <?php if($resEmployer[$j]['employer_id'] == $result[0]['employer_id']){ echo "selected"; } ?>><?php echo $resEmployer[$j]['employer_name']; ?></option>
                        <?php endfor ?>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="uan">PF number</label>
                    <input type="text" name="employee_pf_number" id="e_pf" value="<?php echo $result[0]['employee_pf_number']; ?>" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="esic">ESIC no</label>
                    <input type="text" name="employee_esic_number" id="e_esic" value="<?php echo $result[0]['employee_esic_number']; ?>" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label for="joining_date" class="col-sm-3 col-form-label">Joining Date</label>
                    <input class="col-sm-9 form-control" type="date" name="joining_date" value="<?php echo $result[0]['joining_date']; ?>" id="joining_date">
                </div>
                <div class="form-group row">
                    <label for="joining_date" class="col-sm-3 col-form-label">Leaving Date</label>
                    <input class="col-sm-9 form-control" type="date" name="leaving_date" value="<?php echo $result[0]['leaving_date']; ?>" id="leaving_date">
                </div>
                <button type="submit" name="edit_payroll" class="btn btn-primary">Update Payroll</button>
                <a class="btn btn-danger" href="show_all_payroll.php" role="button">Cancel</a>
                </form>
                <?php endfor ?>
            <?php endif ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    function deleteEmp(e_id){
        if(
            confirm('are you sure, you want to delete?')
        ){
            window.location.href="delete_employee.php?e_id="+e_id
        }
    }
    </script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
</html>