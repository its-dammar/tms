<?php
include("../connection/config.php");
 
 if(isset($_GET['id'])){
    $id = $_GET['id'];

$query=" DELETE FROM setting where id ='$id'";
$result= mysqli_query($conn, $query);
if($result){
    header('Refresh: 0; url=../manage-settings.php');
}
else{
    echo "your data is not delete";
}
 }

?>