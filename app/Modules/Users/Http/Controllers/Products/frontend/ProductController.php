<?php

namespace Users\Http\Controllers\Products\frontend;

use Suppliers\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    //function to return index view
    public function index()
    {
        $products = Product::paginate(3);
        return view(buildView('Users', '', 'index'),compact('products'));
    }


}
