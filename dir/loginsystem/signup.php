<?php
include "partials/_header.php";
include "partials/_navbar.php";
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "partials/_dbConnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $exists = false;
    $existSQL = "SELECT * FROM `users` WHERE `username` = '$username'";

    $result = mysqli_query($conn, $existSQL);
    if (mysqli_num_rows($result) > 0)
        $showError = "Username is not Available!";
    else {
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash',current_timestamp());";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                session_start();
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php");
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
        <form action="/php/dir/loginsystem/signup.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Username</label>
                <input type="text" class="form-control" id="email" name="username" aria-describedby="emailHelp">
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