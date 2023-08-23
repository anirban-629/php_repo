<?php
$loggedin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    $loggedin = true;
?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/php/dir/loginsystem/welcome.php">Notebook</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/php/dir/loginsystem/welcome.php">Home</a>
                </li>
                <?php if (!$loggedin) {
                    echo '
                <li class="nav-item">
                    <a class="nav-link active" href="/php/dir/loginsystem/login.php">Login</a>
                </li>';
                }
                ?>
                <?php if (!$loggedin) {
                    echo '
                <li class="nav-item">
                    <a class="nav-link active" href="/php/dir/loginsystem/signup.php">Signup</a>
                </li>';
                }
                ?>
                </li>
                <?php if ($loggedin) {
                    echo '
                    <li class="nav-item">
                    <a class="nav-link active" href="/php/dir/loginsystem/logout.php">Logout</a>
               ';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>