<?php

/**
* 
*/
class UsersController extends BaseController{
	
	function __construct()	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function getSignin(){
		return View::make('users.signin');
	}

	public function postSignin(){
	
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
			return Redirect::to('/');
		}

		return Redirect::to('users/signin')
			->with('message', 'Wrong email or password. Please try again');
	}

	public function getSignup(){
		return View::make('users.signup');
	}

	public function postSignup(){
		$validate = Validator::make(Input::all(), User::$rules);

		if ($validate->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');
			$user->save();

			return Redirect::to('users/signin')
				->with('message', 'Acount created. Please Sign In now');
		} 

		return Redirect::to('users/signup')
			->withErrors($validate)
			->withInput();

	}

	public function getSignout(){
		Auth::logout();
		return Redirect::to('users/signin')
			->with('message', 'You have been logged out');
	}
}