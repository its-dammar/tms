<nav class="container p-3 mt-3 bg-light d-flex position-sticky top-0" style="z-index: 1;">
    <ul>
        <?php

        $query ="SELECT *FROM setting";
        $result= mysqli_query($conn, $query);
        // $data= $result->fetch_all();
        while($site = $result->fetch_assoc())
        {
            if($site['site_key']=="logo"){
                $logo = $site['site_value'];    
            }
            if($site['site_key']=="text"){
                $text = $site['site_value'];
            }
            if($site['site_key']=="fb"){
                $fb = $site['site_value'];
            }

            // yastai aru declare garne
        }
                
        ?>
        <a href="welcome.php"><img src="uploads/<?php echo $logo; ?>" class="rounded-circle" alt="" width="50" height="50"></a>
    </ul>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="welcome.php"><span class="text-primary fw-bold">T</span> <span class="text-danger fw-bold">MS</span> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="welcome.php"><?php echo $text; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo $fb; ?>"> fb</a>
        </li>
        <li class="dropdown open d-flex">
            <a class="nav-link dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
            </a>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="manageuser.php">manage user</a>
                <a class="dropdown-item" href="loginprocess/logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>