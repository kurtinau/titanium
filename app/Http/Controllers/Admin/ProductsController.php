<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Myclass\MyS3Tool;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use League\Glide\Server;


use Redirect, Input, Auth, Storage, App;
use AWS;
class ProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$host = MyS3Tool::getS3Path();
		return view('admin/productHome')->withProducts(Product::paginate(8))->withHost($host);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.products.create')->withCategories(Category::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|unique:categories|max:255',
		]);
		$disk = Storage::disk('s3');

  		if(!$request->hasFile('fileselect')){
  			// echo var_dump($request->file('fileselect'));
    		exit('上传文件为空！');
  		}
  		$category = Category::find(Input::get('category_id')); 
  		$folder = $category->name;
  		$files = $request->file('fileselect');
  		foreach ($files as $file) {
  			$product = new Product;
 			if(!$file->isValid()){
    			exit('文件上传出错！');
  			}else{
  				if(!$disk->exists($category->name)){
  					$disk->makeDirectory($category->name);
   				}
   				
   				$newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();
   				$product->name = Input::get('name');
   				$product->remark = Input::get('remark');
   				$product->category_id = $category->id; 
   				$savePath = '/'.$category->name.'/'.$newFileName;
   				$product->file_path = $savePath;
   				$product->file_name = $newFileName;
   				if ($product->save()) {
   					$bytes = $disk->put($savePath,file_get_contents($file->getRealPath()));
   					// echo var_dump($bytes);
				} else {
					return Redirect::back()->withInput()->withErrors('保存失败！');
				}
  			}
  		}
		return Redirect::to('admin/products');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.products.edit')->withProduct(Product::find($id))->withHost(MyS3Tool::getS3Path())->withCategories(Category::all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'name' => 'required|unique:categories|max:255',
		]);
		$disk = Storage::disk('s3');

  		if(!$request->hasFile('file')){
    		exit('上传文件为空！');
  		}
  		$categoryId=Input::get('category_id');
  		$category = Category::find($categoryId); 
  		$folder = $category->name;
  		$file = $request->file('file');
  		$product = Product::find($id);
  		$flag = false;
 		if(!$file->isValid()){
    		exit('文件上传出错！');
  		}else{
  			if(!$disk->exists($category->name)){
  					$disk->makeDirectory($category->name);
  					$flag = true;
   				}
   			$product->name = Input::get('name');
   			$product->remark = Input::get('remark');
   			$product->is_home = Input::get('show_in_home');
   			$product->is_rcd = Input::get('show_in_recommand');
   			$oldSavePath = $product->file_path;
   			// echo $product->file_path . '////' . $product->category_id;
   			$savePath = $product->file_path;
   			if ($product->category_id != $category->id) {
   				$product->category_id = $category->id;
   				$savePath = '/' . $category->name . '/' . $product->file_name;
   				$product->file_path = $savePath;
   				// echo $product->file_path . '----' . $product->name . '-'.$product->category_id.'-'.$product->remark.'-'.$product->file_name;
   			}
   			if ($product->save()) {
   				$server = MyS3Tool::getGlideServer();
   				$server->deleteCache($savePath);
   				echo $oldSavePath;
   				$disk->delete($oldSavePath);
   				$bytes = $disk->put($savePath,file_get_contents($file->getRealPath()));
   				// if ($flag) {
   				// 	$disk->delete($oldSavePath);
   				// }
			} else {
				return Redirect::back()->withInput()->withErrors('保存失败！');
			}
  		}
		return Redirect::to('admin/products');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$disk = Storage::disk('s3');
		$product = Product::find($id);
		$server = MyS3Tool::getGlideServer();
   		$server->deleteCache($product->file_path);
		$disk->delete($product->file_path);
		$product->delete();
		return Redirect::to('admin/products');
	}

}
