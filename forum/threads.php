<?php
include "partials/_header.php";
include "partials/_navbar.php";
include "partials/_dbConnect.php";
$id = $_GET['catid'];
$sql = "SELECT * FROM categories WHERE category_id =$id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $catName = $row['category_name'];
    $catDesc = $row['category_desc'];
}
?>
<div class="container mt-4">
    <div class="card text-center">
        <div class="card-header">
            Get all details about <?php echo $catName; ?>
        </div>
        <div class="card-body">
            <h5 class="card-title">Special Discussions</h5>
            <p class="card-text"><?php echo $catDesc; ?></p>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $elaboration = $_POST['elaboration'];
        $sql = "INSERT INTO `thread` ( `thread_title`, `thread_desc`, `thread_cat_id`) 
        VALUES ('$title', '$elaboration', '$id');";
        try {
            $result = mysqli_query($conn, $sql);
            if ($result) $success = true;
            if ($success) echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data added successfullly!!!!!</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        } catch (\Throwable $th) {
            $error = true;
            if ($error) echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Some internal error occurred while uploading statement</strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
    }
    ?>

    <div class="mt-3">
        <h2>Start a Question</h2>
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
            </div>
            <div class="mb-3">
                <label for="elaboration" class="form-label">Password</label>
                <input type="text" class="form-control" name="elaboration" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div>
        <h1 class="my-3">Discussions</h1>
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">
            <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM thread WHERE thread_cat_id =$id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) < 1) echo '<h4 id="scrollspyHeading1">No result found</h4>';
            else {
                while ($row = mysqli_fetch_array($result)) {
                    $thread_title = $row['thread_title'];
                    $thread_desc = $row['thread_desc'];
                    echo '<h4 id="scrollspyHeading1">' . $thread_title . '</h4>
                <p>' . $thread_desc . '</p>
                ';
                }
            }
            ?>
        </div>
    </div>
</div>