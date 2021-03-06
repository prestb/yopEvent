<?php 

/**
* 
*/
class ProductsController extends BaseController{

	public $restful = true;

	function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex(){
		$categories = array();

		foreach (Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}
		return View::make('products.index')
			->with('products', Product::all())
			->with('categories', $categories);
	}

	public function postCreate(){
		$validate = Validator::make(Input::all(), Product::$rules);

		if ($validate->passes()) {
			$product = new Product;
			$product->category_id = Input::get('category_id');
			$product->title = Input::get('title');
			$product->description = Input::get('description');
			$product->price = Input::get('price');

			$image = Input::file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$path = public_path('img/products/'. $filename);
			Image::make($image->getRealPath())->resize(468, 249)->save($path);

			$product->image = 'img/products/'.$filename;
			$product->save();

			return Redirect::to('admin/products/index')
				->with('message', 'Product Created');
		}

		return Redirect::to('admin/products/index')
			->with('message', 'Something went wrong! Product not Created')
			->withErrors($validate)
			->withInput();
	}

	public function postDestroy(){

		$product = Product::find(Input::get('id'));

		if ($product) {
			File::delete('public/'. $product->image);
			$product->delete();
			return Redirect::to('admin/products/index')
				->with('message', 'Product Deleted');
		}

		return Redirect::to('admin/products/index')
			->with('message', 'Product could not be Deleted');
	}

	public function postAvailable(){
		$product = Product::find(Input::get('id'));

		if ($product) {
			$product->availaibility = Input::get('availaibility');
			$product->save();

			return Redirect::to('admin/products/index')->with('message', 'Product Updated!');
		}

		return Redirect::to('admin/products/index')->with('message', 'Invallid Product!');
	}
}