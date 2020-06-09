<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PriceTable;
use App\Models\Product;
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
            'products' => $category->products??'',
            'currentCategory' => $category??'',
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
/*
        if ($request->file('file'))
        {
            $image = $request->file('file')->store('images');
            $category->image = $image;
        } else {
            $category->image = 'images/empty.png';
        }
*/
        if ($request->file('file'))
        {
            $image = $request->file('file')->store('images');
            $product->image = $image;
        } else {
            $product->image = 'images/empty.png';
        }



        $product->category_id = $request->parent_id;

        $product->vendor = $request->vendor;

        $product->save();
        if($request->price)
        {
            $price = new PriceTable();
            $price->product()->associate($product);
            $price->price = $request->price;
            $price->save();
            $product->price_table_id=$price->id;

        }

        return redirect(session('links')[2]); // Will redirect 2 links back
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
        return view('product.edit', [
            'product' => $product,
            'category' => $product->category,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ' ',
        ]);
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

        if($request->file('file'))
        {
            $image = $request->file('file')->store('images');
            $product->image = $image;
        }

        if($request->parent_id)
        {
            $product->category_id = $request->parent_id;
        }
        else
        {
            $product->category_id = 0;
        }

        $product->vendor = $request->vendor;

        $product->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
        }

        return redirect()-back();
    }
}
