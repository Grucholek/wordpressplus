<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ bloginfo('name') }}</title>
  <meta name="description" content="">
  <meta name="keyword" content="">
@section('styles')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://localhost:8000/wp-content\themes\ably\css\style.css">
  @action(wp_enqueue_style( 'style-name', get_stylesheet_uri()))
@show

@action('wp_head')
</head>

<body>
<div class="tabs is-centered is-medium">
  <ul>
        <li>@action(wp_nav_menu(array('items_wrap' => '%3$s')))</li>
  </ul>
</div>

@extends('theme::sidebar')

<div style="margin-left: 400px;" class="container">

<?php
$cat = $_GET["cat"]; 
query_posts("cat=$cat");
if ( have_posts()) : while ( have_posts() ) : the_post();
$pl = get_permalink($id);
echo "<h2 class='title is-2'><a href=$pl><p>"; the_title(); echo "</p></h2>";
endwhile; endif; 
?>
<a href="<?php echo get_permalink($id); ?>" title="<?php the_title_attribute(array('post'=>$id)); ?>">
    </div>
</div>

</div>

@action('wp_footer')

@section('scripts')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@show
</body>
</html>