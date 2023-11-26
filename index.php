<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>



<main>
    <div class="intro">
      <h1>World of light novels</h1>
      <p>buy or borrow books that u like!</p>
      <a href="buy.php" target="_blank">
      <button>Buy Now!</button>
      </a>
    </div>
    <div class="rankings">
      <div class="rank">
        <img src="/WebDevelopment/public_html/image/leaderboard.svg" class="img_icon" alt="leaderboard">
        <p class="rank-heading">Leaderboards</p>
        <p class="rank-text">Daily and Weekly Ranking available.</p>
        <img src="/WebDevelopment/public_html/image/ranking1.jpg"  alt="leaderboard">
      </div>
      <div class="rank">
        <img src="/WebDevelopment/public_html/image/newcomers.svg" class="img_icon" alt="newcomers">
        <p class="rank-heading">Newcomers</p>
        <p class="rank-text">Newest released series.</p>
        <img src="/WebDevelopment/public_html/image/newcomer1.jpg" alt="leaderboard">
      </div>
      <div class="rank">
        <img src="/WebDevelopment/public_html/image/preorder.svg" class="img_icon" alt="Preorder">
        <p class="rank-heading">Buy Now</p>
        <p class="rank-text">Upcoming Big Hits.</p>
        <img src="/WebDevelopment/public_html/image/preorder1.jpg"  alt="leaderboard">
      </div>
    </div>
    <div class="about-me">
      <div class="about-me-text">
        <h2>About Us</h2>
        <p>This is a website powered by the collaboration from japan light novel company Dengeki Bunko, manga company SHUEISHA to provide the best services</p>
      </div>
      <img src="/WebDevelopment/public_html/image/about_us.webp" alt="me">
    </div>
  </main>



<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>