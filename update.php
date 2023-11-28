<?php
session_start();
include 'connexion.php';

$id = $_GET["id"];
if (isset($_POST['submit'])) {
    $title = $_POST['product_title'];
    $description = $_POST['product_description'];
    $price = $_POST['product_price'];
    $img = file_get_contents($_FILES['product_picture']['tmp_name']);


    // Check if the email already exists in the database
    $sql = "UPDATE annonces SET title=?, description=?, price=?, img=? WHERE id=?";

    // Prepare and bind parameters
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ssisi', $title, $description, $price, $img, $id);

    // Execute the update

    if ($stmt->execute()) {
        header('location: dash.php');
        exit();
    } else {
        $error[] = 'Error inserting user data!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update</title>
</head>

<body>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Update product</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form method="POST" enctype="multipart/form-data" action="update.php?id=<?php echo $_GET["id"]; ?>" <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful
                        what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Product Photo</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <input type="file" id="product_picture" name="product_picture" class="sr-only">
                                        </label>
                                    </div>
                                    <input type="file" name="product_picture">
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">

                    <div class="col-span-full">
                        <label for="product_title" class="block text-sm font-medium leading-6 text-gray-900">Product Title</label>
                        <div class="mt-2">
                            <input type="text" name="product_title" id="product_title" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="product_description" class="block text-sm font-medium leading-6 text-gray-900">Product Description</label>
                        <div class="mt-2">
                            <input type="text" name="product_description" id="product_description" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="product_price" class="block text-sm font-medium leading-6 text-gray-900">Product Price</label>
                        <div class="mt-2">
                            <input type="number" name="product_price" id="product_price" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" name="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
        </form>
        </div>
    </main>
    </div>
</body>

</html>