<?php

namespace App\Http\Controllers;

use App\Imports\CategoryImport;
use App\Imports\PriceImport;
use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    private $productService;
    private $productRepository;

    public function __construct(ProductServiceInterface $productService, ProductRepositoryInterface $productRepository)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function products()
    {
        return view('admin.products', [
            'products' => Product::all(),
        ]);
    }

    public function categories()
    {
        return view('admin.categories', [
            'categories' => Category::all()
        ]);
    }

    public function categoryShow(Category $category)
    {
        return view('admin.categories', [
            'categories' => $category->children,
        ]);
    }

    public function uploads()
    {
        return view('admin.uploads');
    }

    public function priceUpload(Request $request)
    {
        Excel::import(new PriceImport(), $request->file('excel'));

        return redirect(session('links')[1]); // Will redirect 1 links back
    }

    public function productsUpload(Request $request)
    {
        $array = Excel::toArray(new ProductsImport(), $request->file('excel'));

        $this->productService->addProductsFromArray($array, $request->parent_id);

        return redirect(session('links')[1]); // Will redirect 1 links back
    }

    public function categoriesUpload(Request $request)
    {
        $array = Excel::import(new CategoryImport(), $request->file('excel'));

        return redirect()->back();
    }

    public function productsEdit(Category $category)
    {
        return view('admin.products-edit', [
            'products' => $category->products??'',
            'attributesByGroups' => $category->getExistingAttributesByGroups()??'',
            'currentCategory' => $category??'',
        ]);

    }

    public function productsUpdate(Category $category, Request $request)
    {
        echo "here";
        dd($request->request);
        die();
    }
}
