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
$app->get('/api/posts/{page}', function($page){

$results = app('db')->select("SELECT * FROM wp_posts ORDER by ID ASC LIMIT " . $page); 

return $results;
});

$app->get('/api/posts', function(){

$results = app('db')->select("SELECT * FROM wp_posts ORDER by ID ASC LIMIT 20"); 

return $results;
});


$app->get('/api/post', function(Request $request){
  $from = $request->input('from');
  $to = $request->input('to');
  	if(empty($request->input()))
  	{
  		$results = app('db')->select('select * from wp_posts');
  	}
  	elseif(isset($from) && isset($to))
  	{
  		$results = app('db')->select('select * from wp_posts where post_date between :from AND :to', ['from' => $from, 'to' => $to]);
  	}
  	else
  	{
  		$results = app('db')->select('select * from wp_posts where id = :id OR post_name = :slug OR (post_date between :from AND NOW()) OR (post_date between :first_time AND :to)', ['id' => $request->input('id'), 'slug' => $request->input('slug'), 'from' => $from, 'to' => $to, 'first_time' => '1973-01-01 00:00:00']);
  	}
  	return $results;
});

$app->get('/api/delete', function(Request $request){
  $id = $request->input('id');

  $results = app('db')->delete('delete from wp_posts WHERE ID = :ID', ['ID' => $id]);
  return $results;
});


$app->get('/api/add', function(Request $request){
  $title = $request->input('title');
  $content = $request->input('content');
  $post_name = $request->input("post_name");

  $results = app('db')->insert("insert into wp_posts (post_content, post_title, post_name) values (:content, :title, :name)", ['content' => $content, 'title' => $title, 'name' => $post_name]);
});

$app->get('/api/edit', function(Request $request){
  $id = $request->input('id');

  switch(true){
    
  case ($request->input('post_name') && $request->input('title') && $request->input('content') && $id):
  $results = app('db')->update("update wp_posts set post_title = :post_title, post_name = :post_name, post_content = :post_content where ID = :id", ['post_name' => $request->input('post_name'), 'post_content' => $request->input('content'), 'post_title' => $request->input('title'), 'id' => $id]);  

  break; 

  case ($request->input('content') && $id):
  $results = app('db')->update("update wp_posts set post_content = :post_content where ID = :id", ['post_content' => $request->input('content'), 'id' => $id]);

  break;

  case ($request->input('title') && $id):
  $results = app('db')->update("update wp_posts set post_title = :post_title where ID = :id", ['post_title' => $request->input('title'), 'id' => $id]);  

  break;

  case ($request->input('post_name') && $id):
  $results = app('db')->update("update wp_posts set post_name = :post_name where ID = :id", ['post_name' => $request->input('post_name'), 'id' => $id]);  

  break; 
  } 

});


require __DIR__.'/wp-routes.php';
