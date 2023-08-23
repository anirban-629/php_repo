<?php
include "header.php";
include "navbar.php";
include "_dbConnect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["desc"];

    $sql = "INSERT INTO `notebook` (`sno`, `title`, `description`) VALUES (NULL, '$title', '$description');";

    try {
        $result = mysqli_query($conn, $sql);
        if ($result)
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Entry uploaded to the database Successfully</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } catch (\Throwable $th) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed to upload entry to the database! We are facing some technical issues!! </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>
<div class="container mt-5">
    <h1>Please Contact with Us</h1>
    <form action="/php/notebook/" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="email" name="title" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label ">Description</label>
            <textarea name="desc" class="form-control" style="resize: none;" cols=" 30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include "footer.php";
