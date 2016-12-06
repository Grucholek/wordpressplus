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
    $id = get_the_ID();
    $content = get_post_field('post_content', $id)
    ?>


  <article class="message is-primary">
  <div class="message-header">
  <h3 class="title is-3">{{single_post_title()}}</h3>
  </div>
  <div class="message-body">
  <h5 class="subtitle is-5">{{ $content }}</h5>
  </div>
  </article>

  {{ the_category(', ') }}

</div>

@action('wp_footer')

@section('scripts')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@show
</body>
</html>