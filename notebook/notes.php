<?php
include "header.php";
include "navbar.php";
include "_dbConnect.php";
include "links.php";
?>
<figure class="text-center my-4">
    <blockquote class="blockquote">
        <p>Check your all Notes here</p>
    </blockquote>
</figure>
<div class="container">

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sno = $_POST['sno'];

        $deleteRecord = "DELETE FROM notebook WHERE `notebook`.`sno` = $sno";
        try {
            $result = mysqli_query($conn, $deleteRecord);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Record deleted successfully!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        } catch (\Throwable $th) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Some internal error occured</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
    }

    $sql = "SELECT * FROM `notebook`";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);


    if ($num == 0) {
        echo '<figure class="text-center my-4">
    <blockquote class="blockquote">
    <h1>No notes Found
    <a href="/php/notebook/">Add a note here</a>
    </h1>
        </blockquote>
</figure>';
    } else {
        echo ' <table class="table">
  <thead>
    <tr>
      <th scope="col-4">Sno.</th>
      <th scope="col-3">Title</th>
      <th scope="col-3">Description</th>
      <th scope="col-1">Edit</th>
      <th scope="col-1">Delete</th>
    </tr>
  </thead>
  <tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            $limitedDescription = (strlen($row['description']) > 50) ? substr($row['description'], 0, 50) . '...' : $row['description'];

            echo '<tr>
      <th scope="row">' . $row['sno'] . '</th>
      <td>' . $row['title'] . '</td>
      <td>' . $limitedDescription .  '</td>

      
      <td class="text-center">
      <a href="/php/notebook/editpage.php/' . $row['sno'] . '">
      edit      </a></td>



      <td class="text-center">
      <form action="/php/notebook/notes.php" method="post" onsubmit="return confirm(\'Are you sure you want to delete this note?\')">
      <input type="hidden" name="sno" value="' . $row['sno'] . '">
      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
      </form></td>
  </tr>';
        }
        echo '</tbody></table>';
    }
    include "header.php";
    ?>

    <!-- <i class="fa-solid fa-pen-to-square"></i> -->