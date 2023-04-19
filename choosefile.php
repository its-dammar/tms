<?php require("inc/header.php"); ?>

<body>

    <?php require("inc/navbar.php"); ?>


    <section class="p-5">
        <div class="container">
            <div class="form w-50 mx-auto">
                <h5 class="py-5">Task Management system</h5>

                <?php
                if (isset($_POST['submit'])) 
                {
                    $name = $_POST['name'];
                    $image = $_POST['image'];
                    if ($name != "" && $image != "") 
                    {
                        $query = "INSERT INTO sliders (name, image) VALUES ('$name','$image')"; // variable
                        $result = mysqli_query($conn, $query); // connect to database
                        if ($result) 
                        {
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Data is submitted successfully !</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                          header("Refresh:1; url=manage-choosefile.php");
                        } else 
                        {
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Data is not submitted !</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                            header("Refresh:1");
                        }
                    } else 
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>All data are required !</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        header("Refresh:1");
                    }
                }
                ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputUsername" class="form-label">File Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername" aria-describedby="userHelp" name="name">
                    </div>
                    <div class="mb-3">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog        ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Image Gallery</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <style>
                                                [type=radio]:checked+img {
                                                    outline: 2px solid #f00;
                                                }
                                            </style>
                                            <?php
                                            $select_query = "SELECT * FROM filemanager";
                                            $select_result = mysqli_query($conn, $select_query);
                                            $i = 0;
                                            while ($data_select = mysqli_fetch_array($select_result)) {
                                                $i++;
                                            ?>
                                                <label class="col-lg-3 col-md-4 col-sm-6">
                                                    <input type="radio" name="image1" value="<?php echo $data_select['filelink']; ?>" style="opacity: 0;" />
                                                    <img src="<?php echo "uploads/" . $data_select['filelink']; ?>" alt="" height="100px;" width="100px;" style="margin-right:20px;">
                                                </label>
                                            <?php
                                            }
                                            mysqli_close($conn);
                                            ?>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="firstFunction() ">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                    </div>
                    <div class="mb-3 d-flex ">
                        <input type="text" id="selectImage" readonly name="image" class="form-control border-end-0" id="exampleInputEmail1" aria-describedby="emailHelp" name="image">
                        <button type="button" class="w-25 btn btn-primary border-start-0 border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Choose Image</button>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        function firstFunction() {
            var selectedOption1 = document.querySelector('input[name=image1]:checked').value;
            document.getElementById('selectImage').value = selectedOption1; // use .innerHTML if we want data on label
        }
    </script>


    <?php require("inc/footer.php"); ?>