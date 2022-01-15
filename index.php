<?php 
include 'includes/autoloader.inc.php' ;
session_start();
if(isset(($_SESSION['u_name']))){
    $obj = new Employeecontr;

    $result = $obj->showAllEmployees();    
    if(isset($_POST['search_button'])){
        $emp_name = $_POST['search_employer'];
        $obj2 = new Employeecontr;
    
        $result = $obj2->showEmployeeByName($emp_name);
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
            <h2>All Employees</h2>
            <form class="form-inline py-2" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search_employer" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" name="search_button" type="submit">Search</button>
            </form>
            <?php if(empty($result)): ?>
                <p class="alert-danger">No Employees found</p>
            <?php endif ?>
            <?php if(!empty($result)): ?>
                
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Mobile no</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php for($i = 0;$i < count($result);$i++): ?>
                    <tr>
                    <th scope="row"><?php echo $result[$i]['employee_id']; ?></th>
                    <td><?php echo $result[$i]['employee_name']; ?></td>
                    <td><?php echo $result[$i]['employee_designation']; ?></td>
                    <td><?php echo $result[$i]['employee_mobile_number']; ?></td>
                    <td>
                        <a href="detail_employee.php?e_id=<?php echo $result[$i]['employee_id'] ?>" class="btn btn-success my-1">View</a>
                        <a href="edit_employee.php?e_id=<?php echo $result[$i]['employee_id'] ?>" class="btn btn-warning my-1">Edit</a>
                        <button onclick="deleteEmp('<?php echo $result[$i]['employee_id'] ?>')" class="btn btn-danger my-1">Delete</button>
                    </td>
                    </tr>
                <?php endfor ?>
                </tbody>
                </table>
            <?php endif ?>
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