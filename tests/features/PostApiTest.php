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
		$response = $this->call('GET', '/api/post?slug=witaj-swiecie');

		$this->assertContains('"ID":1,', $response->getContent());	
	}

	public function testId() 
	{
		$response = $this->call('GET', '/api/post?id=1');

		$this->assertContains('witaj-swiecie', $response->getContent());
	}

	public function testDate()
	{
		$data = app('db')->select("select * from wp_posts where post_date between '2016-12-03 14:22:07' AND '2016-12-05 07:48:59'");

		$this->visit('/api/post?from=2016-12-03%2014:22:07&to=2016-12-05%2007:48:59')->see(json_encode($data));
	}
}
