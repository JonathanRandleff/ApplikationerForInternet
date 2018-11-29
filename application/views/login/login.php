<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
  <title>Tasty Recipes</title>
  <meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="/assets/css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/css/css.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/login.css"/>
</head>

<body>

<!--Content-->
<div class="content">
  <h2>Login Page</h2>

    <?php if($this->input->get('msg') == 1) { ?>
        Wrong username or password.
    <?php } ?>

        <div class="form-login">
            <?php echo validation_errors(); ?>
            <?php echo form_open('member/doLogin'); ?>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <p><a href="<?php echo base_url();?>member/view/register">Don't have an account? Register here</a></p>
            <button type="submit">Login</button>

        </div>
    </form>
</div>

</body>
</html>