<?php
include "partials/_header.php";
include "partials/_navbar.php";
include "partials/_dbConnect.php";

$showAlert = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "partials/_dbConnect.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $exists = false;
    $existSQL = "SELECT * FROM `users` WHERE `user_email` = '$email'";

    $result = mysqli_query($conn, $existSQL);
    if (mysqli_num_rows($result) > 0)
        $showError = "Email is used before!";
    else {
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
if ($showAlert) echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Entry uploaded to the database Successfully</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
if ($showError) echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>' . $showError . '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
?>
<div>
    <h1 class="text-center mt-4">Signup to our website</h1>
    <div class="container mt-5">
        <form action="/php/forum/signup.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Password</label>
                <input type="password" class="form-control" id="email" name="password" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="email" name="cpassword" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
include "partials/_footer.php";
?>