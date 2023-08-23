<title>Forum</title>

<?php
include "partials/_header.php";
include "partials/_navbar.php";
include "partials/_dbConnect.php";
?>
<div class="container">
    <h1 class="text-center my-2">Welcome to iForum </h1>'
    <div class="row ">
        <?php
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $catName = $row['category_name'];
            $catDesc = $row['category_desc'];
            $catId = $row['category_id'];
            echo '
            <div class="col-md-3 my-2 mx-auto">
            <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/500x400/?' . $catName . ',cpp" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $catName . '</h5>
                    <p class="card-text">' . $catDesc . '</p>
                    <a href="/php/forum/threads.php?catid=' . $catId . '" class="btn btn-primary">View Threads</a>
                </div>
            </div>
        </div>

            ';
        }
        ?>

    </div>

</div>