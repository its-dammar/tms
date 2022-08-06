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
        <div class="container">
            <img src="" class="card-img-top" alt="">
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>