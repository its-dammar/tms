<?php include("connection/config.php") ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container w-25 mx-auto my-5 py-5">
        <div class="card pb-5 pt-3 px-2">
          <div class="card-body">
          <h1 class="text-center">Login</h1>
        <?php
        // Start the session
        session_start();

        // Check if the user is already logged in ( secure page)
        if (isset($_SESSION['email'])) {
            header('Location: dashboard.php');
            exit;
        }

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn, $query);

            // Check if the query returned exactly one row
            if (mysqli_num_rows($result) == 1) {
                $user = $result->fetch_assoc();
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];
                header('Location: dashboard.php');
                exit;
            } else {
                echo "<p>Invalid email or password.</p>";
            }

            // Close the database connection
            mysqli_close($conn);
        }
        ?>
        <form method="post" action="">
            <div class="mb-3">
                <label for="email">email:</label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <input type="submit" class="btn btn-danger btn-sm" name="submit" value="Login">
            <a class="ps-5 text-decoration-none" href="sign.php" role="button"> Register </a>
        </form>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>