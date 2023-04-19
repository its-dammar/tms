<?php require("inc/header.php"); ?>


<body>

    <?php require("inc/navbar.php"); ?>


    <section>
        <div class="container p-5">
            <title>Task Management System</title>
            <a href="create-task.php" class="btn btn-primary"> Add Task</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col"> Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $limit = 2;  // Number of entries to show in a page. Look for a GET variable page if not found default is 1.     
                    if (isset($_GET["page"])) {
                        $pn  = $_GET["page"];
                    } else {
                        $pn = 1;
                    }

                    $start_from = ($pn - 1) * $limit;

                    $sql = "SELECT * FROM users order by id DESC  LIMIT $start_from, $limit";
                    $rs_result = mysqli_query($conn, $sql);
                    $i = 0;
                    // while ($data = mysqli_fetch_array( $rs_result))
                    foreach ($rs_result as $value) {
                    ?>
                        <tr>
                            <th scope="row"> <?php echo ++$i; ?> </th>
                            <td> <?php echo $value['name']; ?> </td>
                            <td><?php echo $value['email']; ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#role<?= $value['id'] ?>">
                                    ROle
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="role<?= $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="#" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?=$value['id']?>">
                                                    <select class="form-control" name="role" id="">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Manager</option>
                                                        <option value="3">Peon</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="change">Save changes</button>
                                                </div>
                                            </form>
                                            <?php
                                            if (isset($_POST['change'])) :
                                                $role = $_POST['role'];
                                                $id = $_POST['id'];
                                                $update = $conn->query("UPDATE users SET role='$role' WHERE id = '$id'");
                                            endif
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="edit-task.php?id=<?php echo $value['id']; ?>" class=" btn btn-info"> Edit</a>
                                <a href="view-task.php?id=<?php echo $value['id']; ?>" class="btn btn-primary"> View</a>
                                <a href="process/delete-task.php?id=<?php echo $value['id']; ?>" onclick="return confirm('Do you want to delete data')" class="btn btn-danger">
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
                    $sql = "SELECT COUNT(*) FROM users ";
                    $rs_result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_row($rs_result);
                    $total_records = $row[0];

                    // Number of pages required.
                    $total_pages = ceil($total_records / $limit);
                    $pagLink = "";

                    if ($pn > 1) {
                        echo '<li><a href="?page=' . ($pn - 1) . '">Previous</a></li>';
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $pn) {
                            $pagLink .= "<li class='active'><a class='text-green text-decoration-none ' href='manage-task.php?page=" . $i . "' style='padding:15px; font-size:25px;'>" . $i . "</a></li>";
                        } else {
                            $pagLink .= "<li><a class='text-green text-decoration-none' href='manage-task.php?page=" . $i . "'style='padding:15px; font-size:25px;'>" . $i . "</a></li>";
                        }
                    }
                    echo '<li><a href="?page=' . ($pn + 1) . '">' . $pagLink . '</a></li>';

                    if ($pn < $total_pages) {
                        echo '<li><a href="?page=' . ($pn + 1) . '">Next</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <!-- pagination -->
        </div>
    </section>


    <?php require("inc/footer.php"); ?>