
<?php require("inc/header.php"); ?>
<body>

<?php require("inc/navbar.php"); ?>


    <section class="p-5">
        <div class="container">
            <div class="form w-25 mx-auto">
                <h5 class="py-5">Task Management system</h5>

                <?php 
            if(isset($_POST['submit'])){
                $name = $_POST['name'];

              $filename=$_FILES['dataFile']['name'];
              $filesize=$_FILES['dataFile']['size'];
              
              $explode = explode('.', $filename);
              $firstname = strtolower($explode[0]);
              $ext = strtolower($explode[1]);
              $rep= str_replace(' ', '' ,$filename);
              
              $finalfilename= $rep.time(). '.'.$ext;

          if($filesize>50000){
            if($ext=="jpg"|| $ext=="png"){
                if(move_uploaded_file($_FILES['dataFile']['tmp_name'], 'uploads/'.$finalfilename)){
                    $query ="INSERT INTO filemanager (name, filelink, type) 
                    VALUES ('$name','$finalfilename', '$ext')"; // variable
                   
                    $result= mysqli_query ($conn, $query); // connect to database
                    if($result){
                        echo "file is submitted";
                        echo header ("location: manage-file.php");
                    }
                    else {
                        echo "file is not submitted ";
                    }
                }
            }
            else{
            echo "File extension is not match ";
            }

          }else{
            echo "file size must me less 2MB";
          }


                // validation to input field
          
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
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>

    
<?php require("inc/footer.php"); ?>
