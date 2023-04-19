<?php
include("../connection/config.php");
 
 if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query1="SELECT * from filemanager where id= $id";
    $result= mysqli_query($conn, $query1);
    $row= $result->fetch_assoc();
    $filelink= $row['filelink'];
    $finallink= '../uploads/'.$filelink;
    unlink($finallink);

    $query=" delete from filemanager where id =$id";
    $result= mysqli_query($conn, $query);
    if($result){
        header('Refresh: 0; url=../manage-file.php');
    }
    else{
        echo "your data is not delete";
    }
    }
