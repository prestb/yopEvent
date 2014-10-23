<?php

class UsersTableSeeder extends Seeder{

	public function run(){
		$user = new User;
		$user->firstname = "Don";
		$user->lastname = "Prestb";
		$user->email = "dprestb@gmail.com";
		$user->password = Hash::make("joello");
		$user->telephone = "95283137";
		$user->admin = 1;
		$user->save();

	}
}