<?php

namespace Suppliers\Http\Controllers\Products\frontend;

use Admins\Models\Category;
use Suppliers\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    //function to return index view
    public function index()
    {
        $products = Product::all();
        return view(buildView('Suppliers', 'Products', 'index'),compact('products'));
    }

    //function to show specific Product
    public function show($id)
    {
        $product = Product::find($id);
        return view(buildView('Suppliers', 'Products', 'show'),compact('product'));

    }

    //function to return create view
    public function create()
    {
        $categories = Category::all();
        return view(buildView('Suppliers', 'Products', 'create'),compact('categories'));

    }

    //function to return edit view
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view(buildView('Suppliers', 'Products', 'edit'),compact('product','categories'));

    }

}
