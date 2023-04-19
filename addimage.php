
<?php require("inc/header.php"); ?>


<body>

<?php require("inc/navbar.php"); ?>


    <section class="p-5">
        <div class="container">
            <div class="form w-25 mx-auto">
                <h5 class="py-5">Task Management system</h5>

                <?php 
                    if(isset($_POST['submit'])){
                        $name= $_POST['name'];

                        // find file name like ram.png
                        $filename=$_FILES['dataFile']['name'];
                        // find size of file like 123142
                        $filesize=$_FILES['dataFile']['size'];
                        // fragmentation to file  ram  jpg
                        $explode= explode(".",$filename);
                        // convert file name in to lower case and [0] this is a indexing of file name
                        $fname= strtolower($explode[0]);
                        // convert extension in to lower case and [1] this is a indexing of file name
                        $ext= strtolower($explode[1]);
                        // replace the space on file name ram sharma.jpg : ramsharma.jpg
                        $rep= str_replace(" ", "", $filename);
                        
                        
                        // replace the space on file name ram sharma.jpg : ramsharma.jpg
                        $finalfilename= $rep.time().".".$ext;

                        if($filesize>20000){
                            if($ext=="jpg" || $ext=="png"){
                                if(move_uploaded_file($_FILES['dataFile']['tmp_name'],'uploads/'.$finalfilename)){
                                    $query= "INSERT INTO filemanager(name, filelink, type) VALUES('$name', '$finalfilename', '$ext')";
                                    $result=mysqli_query($conn, $query);
                                }

                            }else{
                                echo "file extension is not acceptable";
                            }

                        }
                        else {
                            echo " file size must be less then 2MB";
                        }

                    }
                    ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputUsername" class="form-label">File Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername" aria-describedby="userHelp" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">File link</label>
                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dataFile">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        <a href="index.php" class="btn btn-sm btn-info">Sign In</a>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>

    
<?php require("inc/footer.php"); ?>
