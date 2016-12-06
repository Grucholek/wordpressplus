<?php /* This file made by Blade. Do not modified. */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo e(bloginfo('name')); ?></title>
  <meta name="description" content="">
  <meta name="keyword" content="">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://localhost:8000/wp-content\themes\ably\css\style.css">
  <?php do_action(wp_enqueue_style( 'style-name', get_stylesheet_uri())); ?>


<?php do_action('wp_head'); ?>
</head>

<body>
<div class="tabs is-centered is-medium">
  <ul>
        <li><?php do_action(wp_nav_menu(array('items_wrap' => '%3$s'))); ?></li>
  </ul>
</div>

<aside style="float: left; width: 300px;" class="menu">
<ul class="menu-list">
<li><?php do_action(get_search_form($echo = true)); ?></li>
<li style="margin-left: 20px;"><br><p>Paragraf 1</p><p>Paragraf 2</p><p>Paragraf 3</p><p>Paragraf 4</p><p>Paragraf 5</p></li>
</ul>
</aside>

<div style="margin-left: 400px;" class="container">

    <?php
    $id = get_the_ID();
    $content = get_post_field('post_content', $id)
    ?>


  <article class="message is-primary">
  <div class="message-header">
  <h3 class="title is-3"><?php echo e(single_post_title()); ?></h3>
  </div>
  <div class="message-body">
  <h5 class="subtitle is-5"><?php echo e($content); ?></h5>
  </div>
  </article>

  <?php echo e(the_category(', ')); ?>


</div>

<?php do_action('wp_footer'); ?>


<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>