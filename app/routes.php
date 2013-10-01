<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// $user = new User;
	// $user->username = 'phillip';
	// $user->email = 'phillip@hopsports.com';
	// $user->password = '123456789';
	// $user->password_confirmation = '123456789';
	// if($user->save())
	// {
	// 	echo 'saved';
	// }
	// else
	// {
	// 	echo 'notsaved';
	// }
	return 'googd job phil!';
});

Route::get('/post', function()
{
	// $post = new Post(array('body' => 'this is the body of the post.'));
	// $user = User::find(1);

	// $user->post()->save($post);
});