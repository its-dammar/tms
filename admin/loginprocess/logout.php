<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);

 echo header("Location: ../index.php?msg=logout_success");