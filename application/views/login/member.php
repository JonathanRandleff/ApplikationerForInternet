<html>
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