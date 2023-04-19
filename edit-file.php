
<?php require("inc/header.php"); ?>


<body>
    
<?php require("inc/navbar.php"); ?>


    <section>

        <div class="container p-4">
            <h1 class="p-3 text-center"> Update </h1>
            <?php

            if (isset($_GET['id'])) {

                $id = $_GET['id'];
                $query = "SELECT * FROM filemanager WHERE id=$id";
                $result = mysqli_query($conn, $query);
                $data = $result->fetch_assoc();
            }

            ?>

            <?php

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $file = $_FILES['dataFile']['name'];
                $file_size = $_FILES['dataFile']['size'];

                // submit previous file
                if ($name != "" && $file == "") {
                    $querry = "UPDATE  filemanager  SET  name='$name' WHERE id='" . $id . "'";

                    $result = mysqli_query($conn, $querry);
                    if ($result) {
                        echo "You didnot changed any thing ";
                    } else
                        echo "not 1st";
                }

                // submit new file & replace old file
                if ($file != "" && $name != "") {

                    if ($file_size <= 200040) {
                        $explode = explode('.', $file); // explode cuts the name after the dot.
                        $flink = strtolower($explode[0]);
                        $extlink = strtolower($explode[1]);
                        $replace = str_replace(' ', '', $file); //to remove space
                        $finalname = $replace . time() . '.' . $extlink; //concating names with time
                        $targrt_file = 'uploads/' . $finalname;
                        if ($extlink == 'jpg' || $extlink == 'png' || $extlink == 'jpeg') {

                            // replace old file
                            $oldfilelink = $data['filelink']; //file link from database
                            $finallink = 'uploads/' . $oldfilelink;
                            unlink($finallink);

                            if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $targrt_file)) {

                                $querry = "UPDATE  filemanager  SET  name='$name', filelink='$finalname', type='$extlink' WHERE id='" . $id . "'";
                                $result = mysqli_query($conn, $querry);
                                if ($result) {
                                    echo "File uploaded";
                                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage-file.php\">";
                                }
                                else{
                                    echo "File is not uploaded";
                                }
                            } else {
                                echo "fiels  upload failed";
                            }
                        } else {

                            echo "extension doesno mattch";
                        }
                    } else {
            ?>
                        <div class="alert alert-primary" role="alert">
                            file size must be less than  2MB
                        </div>

                    <?php

                    }
                } else {
                    ?>
                    <div class="alert alert-primary" role="alert">
                        Filed are required
                    </div>

            <?php
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=manage-file.php\">";
                }
            }
            ?>
            <form action="#" class="bg-light" method="POST" enctype="multipart/form-data">
                <div class="mb-3">

                    <label for="exampleInputEmail1" class="form-label">File Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['name']  ?>">


                </div>
                <div class="mb-3">
                    <img src="<?php echo "uploads/" . $data['filelink'] ?>" alt="" srcset="" width="150px" height="140px">
                    <label for="exampleInputPassword1" class="form-label">Image</label>
                    <input type="file" name="dataFile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mx-auto">

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </section>

    
<?php require("inc/footer.php"); ?>
