<?php 

/**
* 
*/
class Product extends Eloquent{
	
	protected $fillable = array('category_id', 'title', 'description', 'availaibility', 'image', 'price');

	public Static $rules = array(
		'category_id' => 'required|integer',
		'title' => 'required|min:3',
		'description' => 'required|min:20',
		'availaibility' => 'integer',
		'image' => 'required|image|mimes:bmp,jpeg,jpg,png,gif',
		'price' => 'required|numeric'
		);

	public function category(){
		return $this->belongsTo('Category');
	}
}