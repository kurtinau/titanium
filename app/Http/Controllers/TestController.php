<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Myclass\CompressTool;
use Redirect, Input, Auth, Storage, App;
use App\Myclass\MyS3Tool;
use App\Product;

class TestController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$host = MyS3Tool::getS3Path();
		return view('admin.test')->withProduct(Product::find(8))->withHost($host);
;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// echo "zaonima";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(!$request->hasFile('file')){
  			// echo var_dump($request->file('fileselect'));
    		exit('上传文件为空！');
  		}
  		$disk = Storage::disk('local');
  		$file = $request->file('file');
  		$bytes = $disk->put('old.jpg',file_get_contents($file->getRealPath()));
		$tool = new CompressTool;
		$imgdst = "/new.jpg";
		// echo 'zaonima'.$file->getRealPath();
		// $tool->image_png_size_add($file->getRealPath(),$imgdst);
		// $disk->put('new.jpg',file_get_contents("new.jpg"));
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
