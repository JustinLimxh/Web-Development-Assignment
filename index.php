<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Japanese E-Bookshop </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
        <link rel="stylesheet" href="/WebDevelopment/public_html/CSS/MainCSS.css">  
        <link rel="stylesheet" href="/WebDevelopment/public_html/CSS/style.css">
        
</head>

<body>
  <header class="header">
    <a href="/WebDevelopment/public_html/HTML/index.html" class="logo">Japanese E-Bookshop</a>
    
    <nav class="nav-items">
         <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>



   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

   <a><span><?php echo $fetch_user['name']; ?></span> </a>

      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
 
      <a href="/WebDevelopment/public_html/HTML/Buying.html">Buy</a>
      <a href="/WebDevelopment/public_html/HTML/Borrowing.html">Borrow</a>
      <a href="/WebDevelopment/public_html/HTML/PreOrder.html">Preorder</a>
      <a href="/WebDevelopment/public_html/HTML/WishList.html">Wishlist</a>
      <a href="/WebDevelopment/public_html/HTML/MyBook.html">My Book</a>
      <a href="/WebDevelopment/public_html/HTML/Membership.html">Membership</a>
    </nav>
  </header>
  


  <main>
    <div class="intro">
      <h1>World of light novels</h1>
      <p>buy or preorder books that u like!</p>
      <a href="/WebDevelopment/public_html/HTML/Login.html" target="_blank">
      <button>Learn More!</button>
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
        <p class="rank-heading">Preorder</p>
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
  <footer class="footer">
    <div class="copy">&copy; KADOKAWA CORPORATION 2023</div>
    <div class="bottom-links">
      <div class="links">
        <span>More Info</span>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
      </div>
      <div class="links">
        <span>Social Links</span>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>
</body>

</html>