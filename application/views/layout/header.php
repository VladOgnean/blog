<?php echo doctype(); ?>

<html>
  <head>
    <title>Movies blog </title>
    <?php echo link_tag('assets/css/blog.css'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/home_posts.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/news_posts.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/date_personale_membri.js') ?>" type="text/javascript"></script>
  </head>
  <body>
    <ul>
      <li><?php echo anchor("", "Home") ?></li>
      <li><?php echo anchor("news_posts", "TopNews") ?></li>
      <li><?php echo anchor("date_personale_membri", "Newsletter") ?></li>
      <?php if(isset($this->session->userdata["logged_in"])) { ?>
      <li><?php echo anchor("admin", htmlspecialchars($this->session->userdata["logged_in"]["user_name"])) ?></li>
      <li><?php echo anchor("logout", "Logout") ?></li>
      <?php } else { ?>
      <li><?php echo anchor("login", "Login") ?></li>
      <?php } ?>
    </ul>
  <div class="container">
