<html>
<body>
<div class="content">
  <h2>Sign up</h2>
        <div class="form-login">
            <?php echo validation_errors(); ?>
            <?php echo form_open('member/register', array('id' => 'registerForm')); ?>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username">

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password">

            <label for="password2"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="password2">

            <button type="submit">Sign up</button>
        </div>
    </form>
</div>
</body>
</html>