<?php
use Zizaco\FactoryMuff\Facade\FactoryMuff;

class PostTest extends TestCase {

	public function testUserIdIsRequired()
	{
		// Create a new Post
		$post = new Post;

		// Set the body
		$post->body = 'This is the body of the post';

		// Post should not save
		$this->assertFalse($post->save());

		// Save the error
		$errors = $post->errors()->all();

		// There should be 1 error
		$this->assertCount(1, $errors);

		// The errors should be set
		$this->assertEquals($errors[0], 'The user id field is required.');
	}

	public function testPostBodyIsRequired()
	{
		// Create a new Post
		$post = new Post;

		// Create a new User
		$user = FactoryMuff::create('User');

		// Post should not save
		$this->assertFalse($user->post()->save($post));

		// Save the error
		$errors = $post->errors()->all();

		// There should be 1 error
		$this->assertCount(1, $errors);

		$this->assertEquals($errors[0], 'The body field is required.');


	}

	public function testPostSavesCorrectly()
	{
		// Create a new Post
		$post = FactoryMuff::create('Post');

		$this->assertTrue($post->save());

	}

}