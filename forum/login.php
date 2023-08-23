<?php
include "partials/_header.php";
include "partials/_navbar.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "partials/_dbConnect.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $exists = false;
    $existSQL = "SELECT * FROM `users` WHERE `user_email` = '$email'";
    $result = mysqli_query($conn, $existSQL);
    if (mysqli_num_rows($result) == 1) {
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `password`, `created`) VALUES ('$email', '$hash',current_timestamp());";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                session_start();
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("location: index.php");
                exit();
            }
        } else {
            $showError = "Passwords do not matched";
        }
    }
}

?>

<div class="container d-flex align-items-center py-4 bg-body-tertiary mx-auto mt-5" data-new-gr-c-s-check-loaded="14.1119.0" data-gr-ext-installed="">
    <main class="form-signin w-50 m-auto">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <h1 class="h3 mb-3 fw-normal">Please login in</h1>

            <div class="form-floating my-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</div>