<title>Forum</title>

<?php
include "partials/_header.php";
include "partials/_navbar.php";
include "partials/_dbConnect.php";
$loggedin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} ?>
<div>
  <div class="text-center mt-3">
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">Prob-Soln.</h1>
    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Get all Solution of your problems in our platform</p>
  </div>

  <div class="text-center mt-3">
    <a href="javascript:void(0);" onclick="<?php echo $loggedin ? "location.href='start.php';" : "location.href='login.php';"; ?>" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
      Start Discussion
      <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
      </svg>
    </a>
  </div>

  <div class="row mx-16 my-5">
    <div class="mx-16 grid grid-cols-3 gap-4 mt-4">
      <?php
      $sql = "SELECT * FROM categories";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $catName = $row['category_name'];
        $catDesc = $row['category_desc'];
        $catId = $row['category_id'];
        echo '
        <a href="threads.php?catid=' . $catId . '" class="relative block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8 ">
  <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>

  <div class="sm:flex sm:justify-between sm:gap-4">
    <div>
      <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
        ' . $catName . ' </h3>

      <p class="mt-1 text-xs font-medium text-gray-600">By John Doe</p>
    </div>

    <div class="hidden sm:block sm:shrink-0">
      <img alt="Paul Clapton" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80" class="h-16 w-16 rounded-lg object-cover shadow-sm" />
    </div>
  </div>

  <div class="mt-4">
    <p class="max-w-[40ch] text-sm text-gray-500">
     ' . $catDesc . '
    </p>
  </div>

  <dl class="mt-6 flex gap-4 sm:gap-6">
    <div class="flex flex-col-reverse">
      <dt class="text-sm font-medium text-gray-600">Published</dt>
      <dd class="text-xs text-gray-500">31st June, 2021</dd>
    </div>

    <div class="flex flex-col-reverse">
      <dt class="text-sm font-medium text-gray-600">Reading time</dt>
      <dd class="text-xs text-gray-500">3 minute</dd>
    </div>
  </dl>
</a>  
        ';
      }
      ?>

    </div>
  </div>

</div>