<?php 
include 'includes/autoloader.inc.php' ;
session_start();
if(isset(($_SESSION['u_name']))){
    $obj = new Payrollcontr;

    $result = $obj->showAllPayrollWithDetail();  
    if(isset($_POST['search_button'])){
        $emp_name = $_POST['search_payroll'];
        $obj2 = new Payrollcontr;
        //payroll by either employer or employee names
        $result = $obj2->showPayrollByName($emp_name);
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
            <h2>All Payroll</h2>
            <?php if(empty($result)): ?>
                <p class="alert-danger">No Payroll added</p>
            <?php endif ?>
            <?php if(!empty($result)): ?>
                <form class="form-inline py-2" method="POST">
                    <input class="form-control form-control-md mr-sm-2" type="search" placeholder="Search" name="search_payroll" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" name="search_button" type="submit">Search</button>
                </form>
                <form method="POST" id="convert_form" action="export.php">
                <table class="table" id="table_content">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Employer</th>
                    <th scope="col">PF no</th>
                    <th scope="col">ESIC no</th>
                    <th scope="col">Joining date</th>
                    <th scope="col">Leaving date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php for($i = 0;$i < count($result);$i++): ?>
                    <tr>
                    <th scope="row"><?php echo $result[$i]['payroll_id']; ?></th>
                    <td><?php echo $result[$i]['employee_name']; ?></td>
                    <td><?php echo $result[$i]['employer_name']; ?></td>
                    <td><?php echo $result[$i]['employee_pf_number']; ?></td>
                    <td><?php echo $result[$i]['employee_esic_number']; ?></td>
                    <td><?php echo $result[$i]['joining_date']; ?></td>
                    <td><?php echo $result[$i]['leaving_date']; ?></td>
                    <td>
                        <a href="edit_payroll.php?p_id=<?php echo $result[$i]['payroll_id'] ?>" class="btn btn-warning">Edit</a>
                        <button onclick="deletePayroll('<?php echo $result[$i]['payroll_id'] ?>')" class="btn btn-danger">Delete</button>
                    </td>
                    </tr>
                <?php endfor ?>
                </tbody>
                </table>
                <input type="hidden" name="file_content" value="<?php print_r($result); ?>" id="file_content"/>
                <button type="submit" name="convert" id="convert" class="btn btn-success">Export Payroll</button>
                </form>
            <?php endif ?>
            </div>
        </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    window.onload = function() {
        $('#convert').click(function(){
            var table_content = '<table>';
            table_content += $('#table_content').html();
            table_content += '</table>';
            $('#file_content').val(table_content);
            $('#convert_form').html();
            alert(table_content);
        });
}
    function deletePayroll(e_id){
        if(
            confirm('are you sure, you want to delete?')
        ){
            window.location.href="delete_payroll.php?p_id="+p_id
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