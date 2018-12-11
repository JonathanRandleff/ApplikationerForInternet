<html>
<body>
<div class="content">
    <h2>Login Page</h2>
    <div class="form-login">
        <?php echo validation_errors(); ?>
        <?php echo form_open('member/doLogin', array('id' => 'loginForm')); ?>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <p><a href="<?php echo base_url();?>member/view/register">Don't have an account? Register here</a></p>
        <button type="submit">Login</button>
    </div>
</div>
</body>
</html>