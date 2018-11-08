<?php
echo '
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
  <!--Header-->
  <div id="header">
    <h1>Tasty Recipes</h1>
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
  </ul>

'
?>