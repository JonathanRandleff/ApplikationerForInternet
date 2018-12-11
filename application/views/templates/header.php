<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
    <title>Tasty Recipes</title>
<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/assets/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="/assets/css/menu.css"/>
<link rel="stylesheet" type="text/css" href="/assets/css/css.css"/>
<link rel="stylesheet" type="text/css" href="/assets/css/login.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/recipe.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/calendar.css"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/assets/js/js.js"></script>

</head>

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
        echo '<li><a href="#" id ="logout">Logout</a></li>';
    }
    else {
        echo '<li><a href="'. base_url().'member">Login</a></li>';
    }
    ?>
</ul>
</div>
