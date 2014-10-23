<?php 

/**
* 
*/
class Category extends Eloquent{
	
	protected $fillable = array('name');

	public Static $rules = array('name' => 'required|min:3');

	public function product(){
		return $this->hasMany('Product');
	}
}