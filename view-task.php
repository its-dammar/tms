
<?php require("inc/header.php"); ?>


<body>
    
<?php require("inc/navbar.php"); ?>


    <section>
        <div class="container px-3">
            <h1 class=" py-5"> Task Management System</h1>
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
                    echo " data is  submitted ";
                    header('Refresh: 1; url=manage-task.php');
                    // <meta http-equiv="refresh" content=" 0 ; url = manageuser.php" />

                }
                else {
                    echo "data is not submitted";
                }
            }
            }
            ?>
            <div class="title">
                
            <a href="manage-task.php" class="btn btn-primary"> Back</a>
            </div>

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
            </form>
        </div>
    </section>
    
<?php require("inc/footer.php"); ?>
