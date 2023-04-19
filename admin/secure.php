<?php
if(isset($_SESSION['email']))
{

}
else 
{
    echo header("Location: index.php?msg=error");
}