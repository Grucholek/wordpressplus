<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ bloginfo('name') }}</title>
  <meta name="description" content="">
  <meta name="keyword" content="">
@section('styles')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  @action(wp_enqueue_style( 'style-name', get_stylesheet_uri()))
@show

@action('wp_head')
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>@action(wp_nav_menu(array('items_wrap' => '%3$s')))</li>
    </div>
  </div>
</nav>
@extends('theme::sidebar')

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

@action('wp_footer')

@section('scripts')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@show
</body>
</html>
