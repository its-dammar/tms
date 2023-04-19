<?php require("inc/header.php"); ?>


<body>

    <?php require("inc/navbar.php"); ?>


    <section>
        <div class="container px-5">
            <h1 class=" p-5"> Task Management System</h1>
            <?php
            if (isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                // validation to input field
                if ($fname != "" && $lname != "" && $email != "") {
                    $query = "INSERT INTO tasks (fname, lname, email, password) 
                VALUES ('$fname','$lname','$email','$password')"; // variable

                    $result = mysqli_query($conn, $query); // connect to database
                    if ($result) {
            ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Your Data is submitte</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

            <?php


                        header('Refresh: 0.34; url=manage-task.php');
                        // <meta http-equiv="refresh" content=" 0 ; url = manageuser.php" />

                    } else {
                        echo " <span style='color:red'>data is not submitted</span>";
                    }
                } else {
                    echo "<span style='color:warning' class='bg-danger text-white px-5'>All Fields are required</span>";
                }
            }
            ?>

            <form class="row g-3 needs-validation" action="#" method="POST" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" value=" " name="fname">

                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02" value=" " name="lname">

                </div>
                <div class="col-md-6">
                    <label for="validationCustomUsername" class="form-label">email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="validationCustomUsername" name="email" aria-describedby="inputGroupPrepend">

                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">password</label>
                    <input type="password" class="form-control" id="validationCustom03" name="password">

                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" name="submit">Submit Task</button>
                </div>
            </form>
        </div>
    </section>
    
<?php require("inc/footer.php"); ?>
