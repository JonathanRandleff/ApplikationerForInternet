<?php
// Initialize the session
session_start();
?>

<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<link rel="stylesheet" type="text/css" href="css/css.css"/>
  <!--Header-->
  <div id="header">
    <h1>Tasty Recipes</h1>
      <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
          echo 'Logged in as: ';
          echo $_SESSION["username"];
      }
      ?>
  </div>
  
  <!--Navigation-->
   <ul class="navigation">
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
            <a class="dropbtn">Recipes</a>
            <div class="dropdown-content">
                <a href="meatballs.php">Meatballs</a>
                <a href="pancakes.php">Pancakes</a>
            </div>
        </li>
        <li><a href="calendar.php">Calendar</a></li>
       <?php
       if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
          echo '<li><a href="logout.php">Logout</a></li>';
       }
       else {
           echo '<li><a href="login.php">Login</a></li>';
       }
       ?>
  </ul>
