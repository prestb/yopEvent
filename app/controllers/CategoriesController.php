<?php 

/**
* 
*/
class CategoriesController extends BaseController{

	public $restful = true;

	function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex(){
		return View::make('categories.index')
			->with('categories', Category::all());
	}

	public function postCreate(){
		$validate = Validator::make(Input::all(), Category::$rules);

		if ($validate->passes()) {
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();

			return Redirect::to('admin/categories/index')
				->with('message', 'Category Created');
		}

		return Redirect::to('admin/categories/index')
			->with('message', 'Something went wrong! Category not Created')
			->withErrors($validate)
			->withInput();
	}

	public function postDestroy(){

		$category = Category::find(Input::get('id'));

		if ($category) {
			$category->delete();
			return Redirect::to('admin/categories/index')
				->with('message', 'Category Deleted');
		}

		return Redirect::to('admin/categories/index')
			->with('message', 'Category could not be Deleted');
	}
}