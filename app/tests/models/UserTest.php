<?php

class UserTest extends TestCase {

	/**
	 * Username is required
	 */
	public function testUsernameIsRequired()
	{
	  // Create a new User
	  $user = new User;
	  $user->email = "phillip@hopsports.com";
	  $user->password = "password";
	  $user->password_confirmation = "password";
	 
	  // User should not save
	  $this->assertFalse($user->save());
	 
	  // Save the errors
	  $errors = $user->errors()->all();
	 
	  // There should be 1 error
	  $this->assertCount(1, $errors);
	 
	  // The username error should be set
	  $this->assertEquals($errors[0], "The username field is required.");
	}

	public function testConfirmPassword()
	{
		// Create a new User
	  	$user = new User;
	  	$user->username = 'phillippilares1';
	  	$user->email = "phillip@hopsports.com";
	  	$user->password = "password";
	  	$user->password_confirmation = "password1";

	  	// User should not save
	  	$this->assertFalse($user->save());

	  	// Save errors
	  	$errors = $user->errors()->all();

	  	// There should be 1 error
	  	$this->assertCount(1, $errors);

	  	// The username error should be set
	  	$this->assertEquals($errors[0], "The password confirmation does not match.");
	}

	public function testEmailFormat()
	{
		// Create a new User
	  	$user = new User;
	  	$user->username = 'phillippilares2';
	  	$user->email = "phillip";
	  	$user->password = "password";
	  	$user->password_confirmation = "password";

	  	// User should not save
	  	$this->assertFalse($user->save());

	  	// Save errors
	  	$errors = $user->errors()->all();

	  	// There should be 1 error
	  	$this->assertCount(1, $errors);

	  	// The username error should be set
	  	$this->assertEquals($errors[0], "The email format is invalid.");
	}

}