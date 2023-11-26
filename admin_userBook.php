<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
    exit();
}

if (isset($_POST['add_books'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['id']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']); // Add this line
    $pdf = $_FILES['pdf']['name'];
    $pdf_size = $_FILES['pdf']['size'];
    $pdf_tmp_name = $_FILES['pdf']['tmp_name'];
    $pdf_folder = 'uploaded_pdf/' . $pdf;

    // Check if the user exists
    $user_check_query = "SELECT id FROM `users` WHERE id = '$user_id'";
    $result = mysqli_query($conn, $user_check_query);

    if (mysqli_num_rows($result) > 0) {
        // User exists, insert book details
        move_uploaded_file($pdf_tmp_name, $pdf_folder);
        $insert_query = "INSERT INTO `user_book` (user_id, product_name, pdf) VALUES ('$user_id', '$product_name', '$pdf')";
        mysqli_query($conn, $insert_query) or die('Query failed');
        header('location:admin_userBook.php');
        exit();
    } else {
        echo 'User does not exist';
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_pdf_query = mysqli_query($conn, "SELECT pdf FROM `user_book` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_pdf = mysqli_fetch_assoc($delete_pdf_query);
    unlink('uploaded_pdf/' . $fetch_delete_pdf['pdf']);
    mysqli_query($conn, "DELETE FROM `user_book` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_userBook.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user books</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="/WebDevelopment/public_html/CSS/admin_style.css"> 

</head>
<body>

<?php include 'admin_header.php'; ?>

<section class="add-products">
    <h1 class="title">user books</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>add books</h3>
        <input type="text" name="id" class="box" placeholder="enter user id" required>
        <input type="text" name="product_name" class="box" placeholder="enter product name" required> <!-- Add this line -->
        <input type="file" name="pdf" accept="pdf/jpg, pdf/jpeg, pdf/png" class="box" required>
        <input type="submit" value="add books" name="add_books" class="btn">
    </form>
</section>

<section class="show-products">
    <div class="box-container">
        <?php
        $select_pdf = mysqli_query($conn, "SELECT * FROM `user_book`") or die('query failed');
        if (mysqli_num_rows($select_pdf) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_pdf)) {
                ?>
                <div class="box">
                    <img src="uploaded_pdf/<?php echo $fetch_products['pdf']; ?>" alt="">
                    <p><?php echo $fetch_products['product_name']; ?></p> <!-- Display product name -->
                    <a href="admin_userBook.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn"
                       onclick="return confirm('delete this product?');">delete</a>
                </div>
                <?php
            }
        } else {
            echo '<p class="empty">no products added yet!</p>';
        }
        ?>
    </div>
</section>

<script src="/WebDevelopment/public_html/js/admin_script.js"></script>

</body>
</html>
