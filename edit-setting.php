<?php require("inc/header.php"); ?>


<body>

    <?php require("inc/navbar.php"); ?>
    <section>
        <div class="container p-4">
            <h1 class="p-3 text-center"> Update </h1>
            <?php

            if (isset($_GET['id'])) {

                $id = $_GET['id'];
                $query = "SELECT * FROM setting WHERE id=$id";
                $result = mysqli_query($conn, $query);
                $data = $result->fetch_assoc();
            }
            ?>
            <?php
            if (isset($_POST['submit'])) {
                $site_key = $_POST['site_key'];
                $site_value = $_POST['site_value'];

                if ($site_key != "" && $site_value != "") {
                    $setting = "UPDATE setting SET site_key='$site_key', site_value='$site_value' WHERE id=$id";
                    $setting_result = mysqli_query($conn, $setting);
                    if ($setting_result) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Setting data are updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo "<meta http-equiv=\"refresh\" content=\"1;URL=manage-settings.php\">";
                    } else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Setting data are not updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo "<meta http-equiv=\"refresh\" content=\"1;URL=settings.php\">";
                    }
                } else {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        All data are required.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    echo "<meta http-equiv=\"refresh\" content=\"1;URL=settings.php\">";
                }
            }
            ?>
            <form action="#" class="bg-light" method="POST" enctype="multipart/form-data">
                <div class="mb-3">

                    <label for="exampleInputEmail1" class="form-label">Site Key</label>
                    <input type="text" name="site_key" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['site_key']  ?>">


                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Site Value</label>
                    <input type="text" name="site_value" value="<?php echo $data['site_value']  ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mx-auto">

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </section>


    <?php require("inc/footer.php"); ?>