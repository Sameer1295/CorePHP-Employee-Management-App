<?php 
include 'includes/autoloader.inc.php' ;
$emp_id = $_GET['e_id'];
    if(!empty($emp_id)){
        $Emp = new Employercontr();
        $result = $Emp->showEmployerById($emp_id);
    }
    else{
        echo "something went wrong";
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
                    <div class="card">
                        <h5 class="card-header">Employer details</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Employer Name<p class="font-weight-bold"><?php echo $result[$i]['employer_name']; ?></p></li>
                            <li class="list-group-item">Address<p class="font-weight-bold"><?php echo $result[$i]['employer_address']; ?></p></li>
                            <li class="list-group-item">Contact No<p class="font-weight-bold"><?php echo $result[$i]['employer_contact_number']; ?></p></li>
                            <li class="list-group-item">Esic No<p class="font-weight-bold"><?php echo $result[$i]['employer_esic_number']; ?></p></li>
                            <li class="list-group-item">PF No<p class="font-weight-bold"><?php echo $result[$i]['employer_pf_number']; ?></p></li>
                            <li class="list-group-item">GST<p class="font-weight-bold"><?php echo $result[$i]['employer_gst']; ?></p></li>
                        </ul>
                        <a href="edit_employer.php?e_id=<?php echo $result[$i]['employer_id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>   
                <?php endfor ?>
            <?php endif ?>
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