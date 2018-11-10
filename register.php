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
  <h2>Sign up</h2>
    <form action="registerHandler.php" method="post"
        <div class="form-login">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="password2"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="password2" required>

            <button type="submit">Sign up</button>
        </div>
    </form>
</div>

</body>
</html>
<?php
if ( isset($_GET['match']) && $_GET['match'] == 0 )
{
    echo "<script type='text/javascript'>alert('Password does not match, try again');</script>";
}
if ( isset($_GET['taken']) && $_GET['taken'] == 1 )
{
    echo "<script type='text/javascript'>alert('Username already taken, try again');</script>";
}
?>