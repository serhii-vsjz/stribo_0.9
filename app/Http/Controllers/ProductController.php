<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Services\ProductServiceInterface;
use App\Models\{Category, Product};
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\Integer;

class ProductController extends Controller
{
    private $productRepository;
    private $productService;

    public function __construct(ProductRepositoryInterface $productRepository, ProductServiceInterface $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
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
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'category_id' => $request->parent_id,
            'vendor' => $request->vendor,
        ]);

        redirect(session('links')[2]); // Will redirect 2 links back

        /*
        $product = $this->productService->createProduct($request->parent_id, $request->vendor);

        $this->productService->addProductAttributes($product, array_combine($request->attribute, $request->value));

        return redirect(session('links')[2]); // Will redirect 2 links back
        */
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
     * @param Integer $id
     *
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return 'oko';
    }

    public function import(Request $request)
    {
        Excel::import(new ProductsImport(), $request->file('excel'));
        return redirect('/')->with('success', 'All good!');
    }
}
