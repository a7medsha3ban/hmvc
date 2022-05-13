<?php

namespace Users\Http\Controllers\Products\backend;

use Suppliers\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request){
        $search = $request->input('search');
        $products = Product::query()
            ->where('name','like','%'.$search.'%')
            ->orwhereHas('category', function ($query) use ($search){
                return $query->where( 'name', 'LIKE', '%' . $search . '%' );
            })
            ->orderBy('id')
            ->paginate(3);
        $products->appends($request->all());
        return view(buildView('Users', '', 'search'),compact('products'));
    }
}
