<?php
require("../../connection/config.php");

if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $password= md5($_POST['password']);

    if($email!="" && $password!=""){
        $query= " SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result= mysqli_query($conn, $query);
        $count= mysqli_num_rows($result); // count each row
       
        if($count==1){
            $row= $result->fetch_assoc(); // fetch one row

            session_start();
            $_SESSION['id']=  $row['id'];
            $_SESSION['name']=  $row['name'];
            $_SESSION['email']=  $row['email'];
            $_SESSION['role']=  $row['role'];
            echo header("Location: ../home.php?msg=login_success");
        }
        else 
        {
            echo "Error, Login failed";
            echo header("Location: ../index.php?msg=login_Failed");
        }


    }
    else{
        ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            email and password are required
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }
}


?> 