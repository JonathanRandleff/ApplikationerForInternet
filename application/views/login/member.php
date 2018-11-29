<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
  <title>Tasty Recipes</title>
  <meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="/assets/css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/css/css.css"/>
</head>

<body>

<div class="content">
  <h2>Welcome
      <?php
      if ($this->session->userdata('is_authenticated') == TRUE) {
          echo $this->session->userdata('username');
      }
      else {
          redirect(base_url()."member");
      }
      ?>
  </h2>
  <p>You are now logged in</p>
    <p>One of the perks of being a logged in member is the ability to comment on the recipes.</p>
</div>

</body>
</html>