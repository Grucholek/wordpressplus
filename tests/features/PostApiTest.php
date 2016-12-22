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
	/** @test **/
	public function check_if_api_post_exists()
	{
	    $response = $this->call('GET', '/api/post');

	    $this->assertEquals(200, $response->status());
	}

	/** @test **/
	public function check_if_api_posts_exists()
	{
	    $response = $this->call('GET', '/api/posts');

	    $this->assertEquals(200, $response->status());
	}

	/** @test **/
	public function check_if_post_with_given_id_exists_in_db()
	{
		$data = app('db')->select('select * from wp_posts where id = 1');

		$this->visit('/api/post?id=1')->see(json_encode($data));
	}

	/** @test **/
	public function check_if_post_with_given_slug_exists_in_db() 
	{
		$data = app('db')->select("select * from wp_posts where post_name='witaj-swiecie'");

		$this->visit('/api/post?slug=witaj-swiecie')->see(json_encode($data));
	}

	/** @test **/
	public function check_if_array_with_date_from_db_is_same_as_visit()
	{
		$data = app('db')->select("select * from wp_posts where post_date between '2016-12-03 14:22:07' AND '2016-12-05 07:48:59'");

		$this->visit('/api/post?from=2016-12-03%2014:22:07&to=2016-12-05%2007:48:59')->see(json_encode($data));
	}

	/** @test **/
	public function check_if_api_posts_basicly_return_20_posts()
	{
		$data = app('db')->select("select * from wp_posts limit 20");

		$this->visit('/api/posts')->see(json_encode($data));
	}

	/** @test **/
	public function check_if_api_with_parameter_return_required_count_of_posts()
	{
		$data = app('db')->select("select * from wp_posts limit 10");

		$this->visit('/api/posts/10')->see(json_encode($data));
	}

	/** @test **/
	public function check_if_posts_are_ordered_by_newest()
	{
		$data = app('db')->select("select * from wp_posts order by id asc limit 10");

		$this->visit('/api/posts/10')->see(json_encode($data));
	}

	/** @test **/
	public function chceck_if_post_is_deleted_successfully() 
	{
		$this->visit('/api/delete?id=90')->see('1');
	}

	/** @test **/
	public function chceck_if_post_is_added_successfully() 
	{
		$this->visit('/api/add?title=testowy-wpis-phpunit&content=tytul-testowy-phpunit&post_name=testowy-post-name-phpunit');
		$this->seeInDatabase('wp_posts', ['post_name' => 'testowy-post-name-phpunit']);
	}

	/** @test **/
	public function chceck_edit() 
	{
		$this->visit('/api/edit?id=91&content=test-phpunit&title=test-phpunit&post_name=test-phpunit');
		$this->seeInDatabase('wp_posts', ['post_name' => 'test-phpunit', 'post_title' => 'test-phpunit', 'post_content' => 'test-phpunit']);

		$this->visit('/api/edit?id=91&content=test-phpunit1');
		$this->seeInDatabase('wp_posts', ['post_content' => 'test-phpunit1']);

		$this->visit('/api/edit?id=91&title=test-phpunit2');
		$this->seeInDatabase('wp_posts', ['post_title' => 'test-phpunit2']);

		$this->visit('/api/edit?id=91&post_name=test-phpunit3');
		$this->seeInDatabase('wp_posts', ['post_name' => 'test-phpunit3']);
	}

}
