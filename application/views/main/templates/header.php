<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    <link href='<?php echo base_url(); ?>assets/css/index.css' rel='stylesheet' type='text/css' /><!--TODO: in production, set this to 'index.min.css'-->
    <script src='<?php echo base_url(); ?>assets/js/jquery.js' type='text/javascript'></script>
    <style type='text/css'>
    #map {
      height: 500px;
      width: 50vw;
      margin: 0 auto;
    }
    </style>
    <script type='text/javascript'>
    var base_url = "<?php echo base_url(); ?>";
    var center_on = '';
    <?php
      if (isset($place_id)) {
        ?>
        center_on = "<?php echo $place_id; ?>";
        <?php
      }
    ?>
    </script>
  </head>
  <body>
    <header>
      <div id='logo'>
        <h1>poopr</h1>
      </div>
      <nav>
        <a href='<?php echo base_url(); ?>'>Home</a>
        <a href='<?php echo base_url(); ?>main/about'>About</a>
        <a href='<?php echo base_url(); ?>main/contact'>Contact</a>
        <?php
        if (!isset($user)) {
          ?>
          <a href='<?php echo base_url(); ?>user/login'>Login/Signup</a>
          <?php
        } else {
          ?>
          <a href='<?php echo base_url(); ?>user/profile.php'>Your Profile</a>
          <?php
        }
        ?>
      </nav>
    </header>
