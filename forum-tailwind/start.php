<?php
include "partials/_header.php";
include "partials/_navbar.php";

$success = false;
$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];
    $category_desc = $_POST['category_desc'];
    $existSQL = "SELECT * FROM `categories` WHERE `category_name` = '$category_name';";
    $result = mysqli_query($conn, $existSQL);
    if (mysqli_num_rows($result) > 0) {
        $error = 'This Topic is already present in Our Forum.';
    } else {
        $sql = "INSERT INTO `categories` ( `category_name`, `category_desc`) 
        VALUES ( '$category_name', '$category_desc');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = "Discussion has started";
        }
    }
}
if ($error) echo '<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
<span class="text-xl inline-block mr-5 align-middle">
  <i class="fas fa-bell"></i>
</span>
<span class="inline-block align-middle mr-8">
  <b class="capitalize">' . $error . '</b>
</span>
<button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
  <span>×</span>

</button>
</div>';
if ($success) echo '<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
<span class="text-xl inline-block mr-5 align-middle">
  <i class="fas fa-bell"></i>
</span>
<span class="inline-block align-middle mr-8">
  <b class="capitalize">' . $success . '</b>
</span>
<button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
  <span>×</span>

</button>
</div>';
?>
<script>
    function closeAlert(event) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
</script>
<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg text-center">
        <h1 class="text-2xl font-bold sm:text-3xl">Start a discussion</h1>

        <p class="mt-4 text-gray-500">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Et libero nulla
            eaque error neque ipsa culpa autem, at itaque nostrum!
        </p>
    </div>

    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
        <div>
            <label for="email" class="sr-only">Enter Topic name</label>

            <div class="relative">
                <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Enter Topic Name" name="category_name" />

                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </span>
            </div>
        </div>

        <div>
            <label for="proble" class="sr-only">Elaborate your concern</label>

            <div class="relative">
                <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Elaborate your concern" name="category_desc" />

                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                Start your new Discussion
            </button>
        </div>
    </form>
</div>

<?php
include "partials/_footer.php";
?>