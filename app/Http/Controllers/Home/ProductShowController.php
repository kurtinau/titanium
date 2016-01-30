<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;
use App\Product;


class ProductShowController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// echo "zaonima";
		return view('productsRight')->withCategories(Category::all())->withMenu('menu_selected')->withProducts(Product::paginate(15))->withFlag('0');
	}

	public function showDetail($cid,$pid){
		// echo $id;
		return view('productsDetail')->withCategories(Category::all())->withMenu('menu_selected')->withProduct(Product::find($pid))->withProducts(Product::paginate(1));
	}

	public function showCategoryProducts($cid){
		return view('productsRight')->withCategories(Category::all())->withMenu('menu_selected')->withProducts(Product::where('category_id', '=', $cid)->paginate(15))->withFlag($cid);
	}

}
