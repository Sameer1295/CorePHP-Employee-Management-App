<?php 
include 'includes/autoloader.inc.php' ;
session_start();
if(isset(($_SESSION['u_name']))){
    $emp_id = $_GET['e_id'];
    if(!empty($emp_id)){
        $obj = new Employercontr();
        $result = $obj->showEmployerById($emp_id);
        if(isset($_POST['edit_employer'])){
            $e_name = $_POST['e_name'];
            $e_address = $_POST['e_address'];
            $e_contact_number = $_POST['e_contact_number'];
            $e_pf_number = $_POST['e_pf_number'];
            $e_esic_number = $_POST['e_esic_number'];
            $e_gst_number = $_POST['e_gst_number'];
            $obj->addEmployer($e_name,$e_address,$e_contact_number,$e_pf_number,$e_esic_number,$e_gst_number);
            header("Location: show_all_employers.php");
            echo "New Employer added";
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
                <p class="alert-danger">No Employees found</p>
            <?php endif ?>
            <?php if(!empty($result)): ?>
                <?php for($i = 0;$i < count($result);$i++): ?>
                <form action="" method="POST">
                <h2>Add Employer</h2>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="Name">Employer Name</label>
                    <input type="text" name="e_name" id="e_name" value="<?php echo $result[$i]['employer_name'] ?>" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="address">Address</label>
                    <textarea name="e_address" id="e_address" cols="10" rows="3" class="col-sm-9 form-control"><?php echo $result[$i]['employer_address'] ?></textarea>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="mobile_number">Contact number</label>
                    <input type="text" name="e_contact_number" id="e_contact_number" value="<?php echo $result[$i]['employer_contact_number'] ?>" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="uan">PF number</label>
                    <input type="text" name="e_pf_number" id="e_pf" value="<?php echo $result[$i]['employer_pf_number'] ?>" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="esic">ESIC no</label>
                    <input type="text" name="e_esic_number" id="e_esic" value="<?php echo $result[$i]['employer_esic_number'] ?>" class="col-sm-9 form-control">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="gst_number">GST number</label>
                    <input type="text" name="e_gst_number" id="e_gst_number" value="<?php echo $result[$i]['employer_gst'] ?>" class="col-sm-9 form-control">
                </div>
                <button type="submit" name="edit_employer" class="btn btn-primary">Update Employer</button>
                <a class="btn btn-danger" href="show_all_employers.php" role="button">Cancel</a>
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