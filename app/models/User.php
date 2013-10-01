<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Ardent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * The attributes included in mass assignmnet.
	 *
	 * @author Phillip Pilares
	 * @var array
	 **/
	protected $fillable = array('username', 'email');

	/**
	 * The attributes excluded from Mass Assignment
	 *
	 * @author Phillip Pilares
	 * @var array
	 **/
	protected $guarded = array('id', 'password');

	public $autoPurgeRedundantAttributes = true;

	/**
	 * Ardent Validation Rules
	 *
	 **/
	public static $rules = array(
			'username' => 'required|between:4,16',
			'email' => 'required|email',
			'password' => 'required|alpha_num|min:8|confirmed',
			'password_confirmation' => 'required|alpha_num|min:8',
		);

	/**
	 * Factory
	 *
	 **/
	public static $factory = array(
			'username' => 'string',
			'email' => 'email',
			'password' => 'password',
			'password_confirmation' => 'password',
		);

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Post Relationship
	 *
	 * @author Phillip Pilares 
	 **/
	public function post()
	{
		return $this->hasMany('Post');
	}

} // End class User