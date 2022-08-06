<?php
include("connection/config.php");
session_start();
include("secure.php");
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Task Management System</title>
</head>

<body>
<nav class="container p-3 mt-3 bg-light" >
        <ul class="nav">
        <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="welcome.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="create-task.php">Create Task</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-task.php">Manage Task</a>
            </li>
            <li class="dropdown open d-flex">
                <a class="nav-link dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="loginprocess/logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <section>
        <div class="container p-5">
            <h1 class=" p-5"> Task Management System</h1>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT * FROM tasks WHERE id='$id'";
                $show_result = mysqli_query($conn, $show_query);
                // To get only one row data
                $data = $show_result->fetch_assoc();
            }
            ?>
            <?php 
            if(isset($_POST['submit'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // validation to input field
            if($fname!= "" && $lname!="" && $email!=""){
                $query =" UPDATE tasks SET fname='$fname',lname='$lname',email='$email',password='$password' WHERE id='$id'"; // variable
                $result= mysqli_query ($conn, $query); // connect to database
                if($result){
                    echo " <span style='color:green' class='bg-success text-white px-5'>data is  Updated</span>";
                    header('Refresh: 1; url=manage-task.php');
                    // <meta http-equiv="refresh" content=" 0 ; url = manageuser.php" />

                }
                else {
                    echo " <span style='color:green' class='bg-danger text-white px-5'>data is  not updated</span>";
                }
            }
            }
            ?>

            <form class="row g-3 needs-validation" action="#" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $data['fname'];?>"
                        name="fname">

                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02"
                        value="<?php echo $data['lname']; ?>" name="lname">

                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="validationCustomUsername" name="email"
                            value="<?php echo $data['email']; ?>" aria-describedby="inputGroupPrepend">

                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">password</label>
                    <input type="password" class="form-control" id="validationCustom03"
                        value="<?php echo $data['password']; ?>" name="password">

                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" name="submit">Save Task</button>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>