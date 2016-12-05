<?php /* This file made by Blade. Do not modified. */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo e(bloginfo('name')); ?></title>
  <meta name="description" content="">
  <meta name="keyword" content="">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <?php do_action(wp_enqueue_style( 'style-name', get_stylesheet_uri())); ?>


<?php do_action('wp_head'); ?>
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><?php do_action(wp_nav_menu(array('items_wrap' => '%3$s'))); ?></li>
    </div>
  </div>
</nav>
 <div class="row">
        <div class="col-md-3">
            <div class="sidebar-nav-fixed affix">
                <div class="well">
                    <ul class="nav ">
                        <li class="nav-header"></li>
                        <li><?php do_action(get_search_form($echo = true)); ?></li>
                        <li><br><p>Paragraf 1</p><p>Paragraf 2</p><p>Paragraf 3</p><p>Paragraf 4</p><p>Paragraf 5</p></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        </div>

<div class="container">
  <div class="jumbotron">


<?php
$cat = $_GET["cat"]; 
query_posts("cat=$cat");
if ( have_posts()) : while ( have_posts() ) : the_post();
$pl = get_permalink($id);
echo "<a href=$pl><p>"; the_title(); echo "</p>";
endwhile; endif; 
?>
<a href="<?php echo get_permalink($id); ?>" title="<?php the_title_attribute(array('post'=>$id)); ?>">
    </div>
</div>

<?php do_action('wp_footer'); ?>


<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
