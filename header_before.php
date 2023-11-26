<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

  

   <div class="header-2">
      <div class="flex">
         <a href="index.php" class="logo">Japanese E-Bookshop</a>

         <nav class="navbar">
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
            
         </nav>

      </div>
   </div>

</header>