<?php
include "partials/_header.php";
include "partials/_navbar.php";
include "partials/_dbConnect.php";

$id = $_GET['catid'];
$sql = "SELECT * FROM categories WHERE category_id =$id";
$result = mysqli_query($conn, $sql);
$success = false;
$error = false;
$variant = 'red';

while ($row = mysqli_fetch_array($result)) {
    $catName = $row['category_name'];
    $catDesc = $row['category_desc'];
}

$loggedin = false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($loggedin) {
        $title = $_POST['title'];
        $elaboration = $_POST['elaboration'];
        $sql = "INSERT INTO `thread` ( `thread_title`, `thread_desc`, `thread_cat_id`)
                VALUES ('$title', '$elaboration', '$id');";
        try {
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $success = "We've added your question here!!";
                $variant = 'emerald';
            }
        } catch (\Throwable $th) {
            $error = "Some internal error occurred while uploading statement";
            $variant = 'red';
        }
    } else {
        $variant = 'orange';
        $error = 'To ask Question <a class="underline" href="login.php">Login here</a> ';
    }
}

if ($error) echo '<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-' . $variant . '-500">
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
if ($success) echo '<div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-' . $variant . '-500">
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

<div class="max-w-2xl mx-auto">
    <div class="my-10">
        <div class="mx-auto max-w-screen-xl px-4  sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold sm:text-3xl">Want to know more about <?php echo $catName; ?> ?</h1>
                <p class="mt-4 text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et libero nulla
                    eaque error neque ipsa culpa autem, at itaque nostrum!
                </p>
            </div>
        </div>

        <div class="flex justify-center items-center mt-8">
            <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="default-modal">
                Click here to add Your Question !
            </button>
        </div>
    </div>

    <div id="default-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                    <h1 class="text-gray-900 text-3xl lg:text-3xl font-semibold dark:text-white">
                        <?php echo $catName; ?>-Forum <br> Ask your Question! here
                        <p class="mt-4 text-xl text-gray-600">
                            <?php echo $catDesc; ?>
                        </p>
                    </h1>

                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="my-10">
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="mx-auto mb-0 max-w-md space-y-4">
                        <div>
                            <label for="title" class="sr-only">Topic</label>
                            <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Enter Topic" name="title" />
                        </div>
                        <div>
                            <label for="password" class="sr-only">Ask question</label>
                            <input type="text" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" placeholder="Ask question" name="elaboration" />
                        </div>
                        <div class="flex space-x-2 justify-center items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add your Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
<section>
    <h1 class="flex justify-center items-center mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-white">Discussions</h1>
    <div class="max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
        <div class="grid ml-20 justify-center items-center lg:grid-cols-4 gap-4 sm:grid-cols-2">
            <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM thread WHERE thread_cat_id =$id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) < 1) echo '<h4 id="scrollspyHeading1">No result found</h4>';
            else {
                while ($row = mysqli_fetch_array($result)) {
                    $thread_title = $row['thread_title'];
                    $thread_desc = $row['thread_desc'];
                    echo '<div class="block rounded-xl border border-gray-100 p-4 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring" href="/accountant">
                    <span class="inline-block rounded-lg bg-gray-50 p-3">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                        </svg>
                        <h2 class="mt-2 font-bold">' . $thread_title . '</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                        ' . $thread_desc . '
                        </p>
                        </span>   
                </div>';
                }
            }
            ?>
        </div>
    </div>
</section>