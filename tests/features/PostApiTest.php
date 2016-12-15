<?php
class PostApiTest extends TestCase
{

/* SPRAWDZA CZY WYŚWIETLI BŁĄD 404

	public function test404()
	{
		$response = $this->call('GET', '/test/error/test-404');

		$this->assertEquals(404, $response->status());
	}
*/
	public function testPost()
	{
	    $response = $this->call('GET', '/api/post');

	    $this->assertEquals(200, $response->status());
	}

	public function testPosts()
	{
	    $response = $this->call('GET', '/api/posts');

	    $this->assertEquals(200, $response->status());
	}

	public function testSlug()
	{
		$data = app('db')->select('select * from wp_posts where id = 1');

		$this->visit('/api/post?slug=witaj-swiecie')->see(json_encode($data));
	}

	public function testId() 
	{
		$data = app('db')->select("select * from wp_posts where post_name='witaj-swiecie'");

		$this->visit('/api/post?id=1')->see(json_encode($data));
	}

	public function testDate()
	{
		$data = app('db')->select("select * from wp_posts where post_date between '2016-12-03 14:22:07' AND '2016-12-05 07:48:59'");

		$this->visit('/api/post?from=2016-12-03%2014:22:07&to=2016-12-05%2007:48:59')->see(json_encode($data));
	}
}
