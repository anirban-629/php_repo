<?php
include "partials/_header.php";
include "partials/_navbar.php";
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "partials/_dbConnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php");
                exit();
            } else $showError = "Invalid username or password";
        }
    }
}
?>
<div>
    <?php
    if ($login) echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' . " You're " . 'logged in!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    if ($showError) echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>' . $showError . '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    ?>
    <h1 class="text-center mt-4">Login to our website</h1>
    <div class="container mt-5">
        <form action="/php/dir/loginsystem/login.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Username</label>
                <input type="text" class="form-control" id="email" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Password</label>
                <input type="password" class="form-control" id="email" name="password" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
include "partials/_footer.php";
?>