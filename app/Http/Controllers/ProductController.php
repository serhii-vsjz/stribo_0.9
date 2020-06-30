<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\{Category, PriceTable, Product};
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Category|null $category
     * @return Response
     */
    public function index(Category $category = NULL)
    {
        $products = $this->productRepository->getByCategory($category);

        return view('product.index', [
            'products' => $products??'',
            'currentCategory' => $category??'',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category|null $category
     * @return Response
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        dd($request);
        die();
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
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        $product->getExistingAttributes();
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
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
     * @param Request $request
     * @param Product $product
     * @return Response
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

        return redirect(session('links')[2]); // Will redirect 2 links back
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
        }

        return redirect()-back();
    }

    public function import(Request $request)
    {
        Excel::import(new ProductsImport(), $request->file('excel'));
        return redirect('/')->with('success', 'All good!');
    }
}
