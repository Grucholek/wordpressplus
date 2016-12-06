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
    $args = array( 'numberposts' => '10' );
    $recent_posts = wp_get_recent_posts( $args );
    ?>

    <h1 class="title is-1">Tekst wprowadzający H1</h1>
    @foreach ($recent_posts as $recent)
    <article class="message is-primary">
    <div class="message-header">
    <h3 class="title is-3"><a style="color: #363636;" href="{{ get_permalink($recent["ID"]) }}">{{ $recent[post_title] }}</a></p></h3>
    </div>
    <div class="message-body">
    {{ $recent[post_content] }}
    </div>
    </article>
    @endforeach
</div>

@action('wp_footer')

@section('scripts')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@show
</body>
</html>