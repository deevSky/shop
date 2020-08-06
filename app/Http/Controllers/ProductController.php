<?php

namespace App\Http\Controllers;

use App\Comment;
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
        $comments = Comment::all();
        return response()->json([
            'products' => $products,
            'comments' => $comments
        ], 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2|max:500'
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;

        $product->save();

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
        return response()->json([
            'product' => $product
        ], 200);
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
        $this->validate($request, [
            'title' => 'sometimes|min:2|max:50',
            'description' => 'sometimes|min:2|max:50'
        ]);

        $product->category()->detach();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category()->sync($request->categories, false);
        $product->save();
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
