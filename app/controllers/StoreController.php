<?php

class StoreController extends BaseController{

	public function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
		// $this->beforeFilter('admin');
	}

	public function getIndex(){
		return View::make('stores.index')
			->with('products', Product::take(4)->orderBy('created_at', 'DESC')->get());
	}

	public function getProduct($id){
		$product = Product::find($id);

		if ($product) {
			return View::make('stores.product')
				->with('product', $product);
		}

		return Redirect::to('/')
			->with('message', 'Product does not exist!');
	}

	public function getCategory($catID){
		return View::make('stores.category')
			->with('products', Product::where('category_id', '=', $catID)->paginate(2))
			->with('category', Category::find($catID));
	}

	public function getSearch(){
		$keyword = Input::get('keyword');

		return View::make('stores.search')
			->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->get())
			->with('keyword', $keyword);
	}

	public function getContact(){
		return View::make('stores.contact');
	}
}