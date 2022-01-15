<?php 
include 'includes/autoloader.inc.php' ;
session_start();
if(isset(($_SESSION['u_name']))){
    $obj = new Employeecontr;
    $result = $obj->showAllEmployees();
    if(isset($_POST['add_employee'])){
        $e_code = $_POST['e_code'];
        $e_name = $_POST['e_name'];
        $e_gender = $_POST['e_gender'];
        $e_designation = $_POST['e_designation'];
        $e_father_name = $_POST['e_father_name'];
        $e_mother_name = $_POST['e_mother_name'];
        $e_dob = $_POST['e_dob'];
        $e_payroll = $_POST['e_payroll'];
        $e_esic = $_POST['e_esic'];
        $e_uan = $_POST['e_uan'];
        $e_education = $_POST['e_education'];
        $e_marital_status = $_POST['e_marital_status'];
        $e_mobile_number = $_POST['e_mobile_number'];
        $e_address = $_POST['e_address'];
        $e_permanent_address = $_POST['e_permanent_address'];
        $e_adhaar = $_POST['e_adhaar'];
        $e_pan_card = $_POST['e_pan_card'];
        $e_blood_group = $_POST['e_blood_group'];
        $e_body_mark = $_POST['e_body_mark'];
        $e_bank_name = $_POST['e_bank_name'];
        $e_branch_name = $_POST['e_branch_name'];
        $e_account_number = $_POST['e_account_number'];
        $e_ifsc = $_POST['e_ifsc'];
        $obj->addEmployee($e_code,$e_name,$e_gender,$e_father_name,$e_mother_name,$e_dob,$e_designation,$e_payroll,$e_esic,$e_uan,$e_education,$e_marital_status,$e_adhaar,$e_address,$e_permanent_address,$e_pan_card,$e_bank_name,$e_branch_name,$e_account_number,$e_ifsc,$e_blood_group,$e_mobile_number,$e_body_mark);
        header("Location: index.php");
        echo "New User added";
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
                <form action="" method="POST">
                <h2>Add Employees</h2>
                <p class="font-weight-bold">Personal Details</p>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="Code">Employee Code</label>
                    <input type="text" name="e_code" id="e_code" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="Name">Employee Name</label>
                    <input type="text" name="e_name" id="e_name" class="col-sm-9 form-control">
                </div>
                <div class="form-group-row">
                    <label class="col-sm-3 col-form-label" for="gender">Employee Gender</label>
                    <label class="col-sm-3 radio-inline"><input type="radio" name="e_gender" value="1">Male</label>
                    <label class="col-sm-3 radio-inline"><input type="radio" name="e_gender" value="0">Female</label>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="Designation">Employee Designation</label>
                    <input type="text" name="e_designation" id="e_designation" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="fatherName">Father Name</label>
                    <input type="text" name="e_father_name" id="e_father_name" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="motherName">Mother Name</label>
                    <input type="text" name="e_mother_name" id="e_mother_name" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label for="example-date-input" class="col-sm-3 col-form-label"> Date of Birth</label>
                    <input class="col-sm-9 form-control" type="date" name="e_dob" id="example-date-input">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="payroll">Payroll</label>
                    <input type="text" name="e_payroll" id="e_payroll" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="esic">ESIC no</label>
                    <input type="text" name="e_esic" id="e_esic" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="uan">UAN</label>
                    <input type="text" name="e_uan" id="e_uan" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="education">Education</label>
                    <input type="text" name="e_education" id="e_education" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="marital_status">Marital Status</label>
                    <input type="text" name="e_marital_status" id="e_marital_status" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="mobile_number">Mobile number</label>
                    <input type="text" name="e_mobile_number" id="e_mobile_number" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="address">Present Address</label>
                    <textarea name="e_address" id="e_address" cols="10" rows="3" class="col-sm-9 form-control"></textarea>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="permanent_address">Permanent Address</label>
                    <textarea name="e_permanent_address" id="e_permanent_address" cols="10" rows="3" class="col-sm-9 form-control"></textarea>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="adhaar">Aadhaar number</label>
                    <input type="text" name="e_adhaar" id="e_adhaar" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="pan_card">Pan Card</label>
                    <input type="text" name="e_pan_card" id="e_pan_card" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="blood_group">Blood group</label>
                    <input type="text" name="e_blood_group" id="e_blood_group" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="body_mark">Body Identification Mark</label>
                    <input type="text" name="e_body_mark" id="e_body_mark" class="col-sm-9 form-control">
                </div>
                <p class="font-weight-bold">Bank Details</p>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="bank_name">Bank name</label>
                    <input type="text" name="e_bank_name" id="e_bank_name" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="branch_name">Branch Name</label>
                    <input type="text" name="e_branch_name" id="e_branch_name" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="account_number">Account number</label>
                    <input type="text" name="e_account_number" id="e_account_number" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="ifsc_code">IFSC Code</label>
                    <input type="text" name="e_ifsc" id="e_ifsc" class="col-sm-9 form-control">
                </div>
                <button type="submit" name="add_employee" class="btn btn-primary">Add Employee</button>
                <a class="btn btn-danger" href="index.php" role="button">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
</html>