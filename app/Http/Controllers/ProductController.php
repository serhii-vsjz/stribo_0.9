<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Category|null $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category = NULL)
    {
        return view('product.index', [
            'products' => $category->products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category|null $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category = NULL)
    {
        return view('product.create', [
            'category' => $category,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ' ',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;

        $image = $request->file('file')->store('images');
        $product->image = $image;

        $product->category_id = $request->parent_id;

        $product->vendor = $request->vendor;

        $product->save();

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->title;

        if($request->file('image'))
        {
            $image = $request->file('image')->store('images');
            $product->image = $image;
        }

        if($request->category_id)
        {
            $product->category_id = $request->category_id;
        }
        else
        {
            $product->category_id = 0;
        }

        $product->vendor = $request->vendor;

        $product->save();

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('product.index'));
    }
}
