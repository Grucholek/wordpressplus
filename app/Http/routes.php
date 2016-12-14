<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/api/post', function(Request $request){

  $id =  $request->input('id');
  $slug = $request->input('slug');
  $from = $request->input('from');
  $to = $request->input('to');
  $first_time = "1973-01-01 00:00:00";

  if(isset($id))
  {
  	return $results = app('db')->select('select * from wp_posts where id = :id', ['id' => $id]);
  }
  elseif(isset($slug))
  {
  	return $results = app('db')->select('select * from wp_posts where post_name = :slug', ['slug' => $slug]);
  }
  elseif(isset($from) && empty($to))
  {
  	return $results = app('db')->select('select * from wp_posts where post_date between :from AND NOW()', ['from' => $from]);
  }
  elseif(isset($to) && empty($from))
  {
  	return $results = app('db')->select('select * from wp_posts where post_date between :first_time AND :to', ['first_time' => $first_time, 'to' => $to]);
  }
  elseif(isset($to) && isset($from))
  {
  	return $results = app('db')->select('select * from wp_posts where post_date between :from AND :to', ['from' => $from, 'to' => $to]);
  }
});

require __DIR__.'/wp-routes.php';
