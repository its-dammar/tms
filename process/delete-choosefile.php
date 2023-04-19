<?php
include("../connection/config.php");
 
 if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query1="SELECT * FROM sliders where id= $id";
    $result= mysqli_query($conn, $query1);
    $row= $result->fetch_assoc();

    $query=" DELETE FROM sliders where id =$id";
    $result= mysqli_query($conn, $query);
    if($result){
        header('Refresh: 0; url=../manage-choosefile.php');
    }
    else{
        echo "your data is not delete";
    }
    }
