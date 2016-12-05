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
    <h1>Nagłówek h1</h1>
    <div>

    <?php
    $args = array( 'numberposts' => '10' );
    $recent_posts = wp_get_recent_posts( $args );
    ?>

    @foreach ($recent_posts as $recent)
    <p><a href="{{ get_permalink($recent["ID"]) }}">{{ $recent[post_title] }}</a></p>
    @endforeach

    </div>
</div>


@action('wp_footer')

@section('scripts')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@show
</body>
</html>
