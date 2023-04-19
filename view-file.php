
<?php require("inc/header.php"); ?>


<body>
  
<?php require("inc/navbar.php"); ?>


    <section>
        <div class="container w-50 mx-auto">
            <h1 class=" py-5"> Task Management System</h1>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT * FROM filemanager WHERE id='$id'";
                $show_result = mysqli_query($conn, $show_query);
                // To get only one row data
                $data = $show_result->fetch_assoc();
            }
            ?>
            <?php
            if (isset($_POST['submit'])) {
                $fname = $_POST['filelink'];
                $fname = $_POST['name'];

                // validation to input field
                if ($fname != "" && $lname != "" && $email != "") {
                    $query = " UPDATE filemanager SET filelink='$fname',name='$lname' WHERE id='$id'"; // variable
                    $result = mysqli_query($conn, $query); // connect to database
                    if ($result) {
                        echo " data is  submitted ";
                        header('Refresh: 1; url=manage-file.php');
                        // <meta http-equiv="refresh" content=" 0 ; url = manageuser.php" />

                    } else {
                        echo "data is not submitted";
                    }
                }
            }
            ?>

            <div class="container w-50 mx-auto">
                <a href="manage-file.php" class="btn btn-primary"> Back</a>
                <form class="row g-3 needs-validation" action="#" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">File name</label>
                        <input type="text" class="form-control" id="validationCustom01" disabled value="<?php echo $data['name']; ?>" name="fname">

                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Preview File</label>
                        <img src="<?php echo "uploads/" . $data['filelink']; ?>" alt="" width="100" height="100">

                    </div>
                </form>
            </div>
        </div>
    </section>
    
<?php require("inc/footer.php"); ?>
