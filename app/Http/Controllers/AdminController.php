<?php

namespace App\Http\Controllers;

use App\Imports\CategoryImport;
use App\Imports\PricesImport;
use App\Imports\PrimeCostsImport;
use App\Imports\ProductComponentsImport;
use App\Imports\ProductsImport;
use App\Imports\ServicesImport;
use App\Models\Category;
use App\Models\Cost;
use App\Models\PrimeCost;
use App\Models\Product;
use App\Models\Service;
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

    public function categories()
    {
        return view('admin.categories', [
            'categories' => Category::all()
        ]);
    }

    public function products()
    {
        return view('admin.products', [
            'products' => Product::all(),
        ]);
    }

    public function costs()
    {
        return view('admin.costs', [
            'costs' => Cost::all(),
        ]);
    }

    public function services()
    {
        return view('admin.services', [
            'services' => Service::all(),
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
        $list = ['category', 'product', "prime cost", 'services', 'components'];
        return view('admin.uploads', ['list' => $list]);
    }

    public function upload(Request $request)
    {
        switch ($request->list) {
            case ('category'):
                Excel::import(new CategoryImport(), $request->file('excel'));
                break;
            case ('product'):
                Excel::import(new ProductsImport(), $request->file('excel'));
                break;
            case ("prime cost"):
                Excel::import(new PrimeCostsImport(), $request->file('excel'));
                break;
            case ('services'):
                Excel::import(new ServicesImport(), $request->file('excel'));
                break;
            case ('components'):
                Excel::import(new ProductComponentsImport(), $request->file('excel'));
                break;
        }

        return redirect()->back();
    }


    private function productsUpload(Request $request)
    {
        $array = Excel::toArray(new ProductsImport(), $request->file('excel'));

        $this->productService->addProductsFromArray($array, $request->parent_id);

        return redirect()->back();
    }

    private function priceUpload(Request $request)
    {
        Excel::import(new PricesImport(), $request->file('excel'));

        return redirect()->back();
    }

    private function primeCostsUpload(Request $request)
    {
        Excel::import(new PrimeCostsImport(), $request->file('excel'));

        return redirect()->back();
    }

    private function servicesUpload(Request $request)
    {
        Excel::import(new ServicesImport(), $request->file('excel'));

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
}
