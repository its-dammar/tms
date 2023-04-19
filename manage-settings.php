
<?php require("inc/header.php"); ?>


<body>
    
<?php require("inc/navbar.php"); ?>


    <section>
        <div class="container p-5">
            <title>Task Management System</title>
            <a href="settings.php" class="btn btn-primary"> Add setting item</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Site Key</th>
                        <th scope="col">Site Value </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $limit = 15;  // Number of entries to show in a page. Look for a GET variable page if not found default is 1.     
                    if (isset($_GET["page"])) { 
                    $pn  = $_GET["page"]; 
                    } 
                    else { 
                    $pn=1; 
                    } 
                
                    $start_from = ($pn-1) * $limit;  
                
                    $sql = "SELECT * FROM setting order by id DESC  LIMIT $start_from, $limit";  
                    $rs_result = mysqli_query($conn, $sql); 
                    $i=0;
                    while ($data = mysqli_fetch_array( $rs_result)){
                    ?>
                    <tr>
                        <th scope="row"> <?php echo ++$i; ?> </th>
                        <td><?php echo $data['site_key']; ?></td>
                        <td> <?php echo $data['site_value']; ?> </td>
                        <td>
                            <a href="edit-setting.php?id=<?php echo $data['id']; ?>" class=" btn btn-info"> Edit</a>
                            <a href="process/delete-setting.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Do you want to delete data')" class="btn btn-danger">
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
                        $sql = "SELECT COUNT(*) FROM setting ";  
                        $rs_result = mysqli_query($conn, $sql);  
                        $row = mysqli_fetch_row($rs_result);  
                        $total_records = $row[0];  
                            
                        // Number of pages required.
                        $total_pages = ceil($total_records / $limit);  
                        $pagLink = "";   
                        if ($pn > 1) {
                            echo '<li><a href="?page='.($pn - 1).'">Previous</a></li>';
                        }                     
                        for ($i=1; $i<=$total_pages; $i++) {
                            if ($i==$pn) {
                                $pagLink .= "<li class='active'><a class='text-green text-decoration-none ' href='manage-settings.php?page=".$i."' style='padding:15px; font-size:25px;'>".$i."</a></li>";
                            }            
                            else  {
                                $pagLink .= "<li><a class='text-green text-decoration-none' href='manage-settings.php?page=".$i."'style='padding:15px; font-size:25px;'>".$i."</a></li>";  
                            }
                        }
                        echo '<li><a href="?page='.($pn + 1).'">'.$pagLink.'</a></li>';  
                        
                        if ($pn < $total_pages) {
                            echo '<li><a href="?page='.($pn + 1).'">Next</a></li>';
                            
                        }  
                    ?>
                </ul>
            </div>
            <!-- pagination -->
        </div>
    </section>

    
<?php require("inc/footer.php"); ?>
