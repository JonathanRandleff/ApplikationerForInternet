<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
  <title>Tasty Recipes</title>
  <meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="css/css.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>

<body>

<!--Header and Navigation-->
<div id="topbox">
    <?php include 'menu.php'?>
</div>

<!--Content-->
<div class="content">
  <h2>Login Page</h2>
    <form action="loginHandler.php" method="post"
        <div class="form-login">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">Login</button>
        </div>
    </form>
</div>

</body>
</html>

<?php
if ( isset($_GET['success']) && $_GET['success'] == 0 )
{
    echo "<script type='text/javascript'>alert('Wrong username or password');</script>";
}
?>