<?php
include "header.php";
include "_dbConnect.php";
include "navbar.php";

$current_url = $_SERVER['REQUEST_URI'];
$url_parts = explode('/', $current_url);
$sno = end($url_parts);

$sql = "SELECT * FROM `notebook` WHERE `sno` = $sno;";
try {
    $result = mysqli_query($conn, $sql);
    $record = mysqli_fetch_assoc($result);
    $title = $record['title'];
    $description = $record['description'];
} catch (\Throwable $th) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Some internal error occured</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['desc'];
    $updateSQL = "UPDATE `notebook`
                 SET `title` = '$title', 
                 `description` = '$description' 
                 WHERE `sno` = $sno;";
    try {
        mysqli_query($conn, $updateSQL);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Updated Successfully!!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
    } catch (\Throwable $th) {
        echo $th;
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Some internal error occured... failed to update!!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
?>

<div class="container mt-5">
    <h1>Please Contact with Us</h1>
    <form action="/php/notebook/editpage.php" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="email" name="title" aria-describedby="emailHelp" <?php echo "value=$title" ?>>
        </div>

        <div class=" mb-3">
            <label for="desc" class="form-label ">Description</label>
            <textarea name="desc" class="form-control" style="resize: none;" cols=" 30" rows="10"><?php echo $description ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php
include "footer.php"
?>