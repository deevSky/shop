<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
//use Faker\Provider\Image;
use Intervention\Image\Image;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'DESC')->limit('10')->get();
        return response()->json([
            'products' => $products
        ], 200);
    }

    public function create(Request $request)
    {
//        dd(66666666666666);

        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2|max:500'
        ]);

        $strpos = strpos($request->photo, ';');
        $sub = substr($request->photo, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $photo_name = time() . "." . $ex;
        $img = Image::make($request->photo)->resize(300, 300);
        $path = public_path() . "/uploadImage/";
        $img->save($path.$photo_name);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->save();
//
//        $input = $request->all();
//        if ($request->hasFile('image')) {
//
//
//            $file_extension = $product->id . '.jpg';
//            $product->image = $file_extension;
//            $product->save();
//            $destination_path = public_path() . '\images';
//            $filename = $file_extension;
//            $request->file('image')->move($destination_path, $filename);
//            $input['image'] = $filename;
//        }
//


        $product->category()->sync($request->categories, false);
        return ['message' => 'ok'];
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
