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
</head>

<body>
    <nav class="container p-3 mt-3 bg-light">
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
        <div class="container p-5">
            <title>Task Management System</title>
            <a href="create-task.php" class="btn btn-primary"> Add Task</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $limit = 8;  // Number of entries to show in a page. Look for a GET variable page if not found default is 1.     
                    if (isset($_GET["page"])) { 
                    $pn  = $_GET["page"]; 
                    } 
                    else { 
                    $pn=1; 
                    };  
                
                    $start_from = ($pn-1) * $limit;  
                
                    $sql = "SELECT * FROM tasks order by id DESC  LIMIT $start_from, $limit";  
                    $rs_result = mysqli_query($conn, $sql); 
                    $i=0;
                    while ($data = mysqli_fetch_array( $rs_result)){
                    ?>
                    <tr>
                        <th scope="row"> <?php echo ++$i; ?> </th>
                        <td> <?php echo $data['fname']; ?> </td>
                        <td><?php echo $data['lname']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td>
                            <a href="edit-task.php?id=<?php echo $data['id']; ?>" class=" btn btn-info"> Edit</a>
                            <a href="view-task.php?id=<?php echo $data['id'] ;?>" class="btn btn-primary"> View</a>
                            <a href="process/delete-task.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">
                                Delete</a>
                        </td>
                    </tr>
                    <?php

              }
              
              ?>

                </tbody>
            </table>


            <!-- pagination -->
            <div class="pagination-section">
                <ul class="pagination bg-light mx-auto w-50">
                    <?php  
                        $sql = "SELECT COUNT(*) FROM tasks";  
                        $rs_result = mysqli_query($conn, $sql);  
                        $row = mysqli_fetch_row($rs_result);  
                        $total_records = $row[0];  
                            
                        // Number of pages required.
                        $total_pages = ceil($total_records / $limit);  
                        $pagLink = "";                        
                        for ($i=1; $i<=$total_pages; $i++) {
                            if ($i==$pn) {
                                $pagLink .= "<li class='active'><a class='text-green text-decoration-none ' href='manage-task.php?page="
                                                                .$i."' style='padding:15px; font-size:25px;'>".$i."</a></li>";
                            }            
                            else  {
                                $pagLink .= "<li><a class='text-green text-decoration-none' href='manage-task.php?page=".$i."'style='padding:15px; font-size:25px;'>
                                                                ".$i."</a></li>";  
                            }
                        };  
                        echo $pagLink;  
                    ?>
                </ul>
            </div>
            <!-- pagination -->
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>