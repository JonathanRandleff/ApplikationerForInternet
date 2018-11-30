<link rel="stylesheet" type="text/css" href="/assets/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="/assets/css/menu.css"/>
<link rel="stylesheet" type="text/css" href="/assets/css/css.css"/>

<div id="topbox">

<!--Header-->
<div id="header">
    <a href="<?php echo base_url();?>">
        <h1>Tasty Recipes</h1>
    </a>
    <?php
    if ($this->session->userdata('is_authenticated') == TRUE) {
        echo 'Logged in as: ';
        echo $this->session->userdata('username');
    }
    ?>
</div>

<!--Navigation-->
<ul class="navigation">
    <li><a href="<?php echo base_url();?>">Home</a></li>
    <li class="dropdown">
        <a class="dropbtn">Recipes</a>
        <div class="dropdown-content">
            <a href="<?php echo base_url();?>recipe/view/meatballs">Meatballs</a>
            <a href="<?php echo base_url();?>recipe/view/pancakes">Pancakes</a>
        </div>
    </li>
    <li><a href="<?php echo base_url();?>calendar">Calendar</a></li>
    <?php
    if ($this->session->userdata('is_authenticated') == TRUE) {
        echo '<li><a href="'. base_url().'member/logout">Logout</a></li>';
    }
    else {
        echo '<li><a href="'. base_url().'member">Login</a></li>';
    }
    ?>
</ul>
</div>
