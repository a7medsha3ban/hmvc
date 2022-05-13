<?php

namespace Suppliers\Http\Controllers\Products\backend;

use Suppliers\Http\Requests\Products\StoreProductRequest;
use Suppliers\Http\Requests\Products\UpdateProductRequest;
use Suppliers\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function store(StoreProductRequest $request)
    {
        DB::beginTransaction();
//        try {
            $product = Product::create([
                'name'=> ucfirst($request->input('name')),
                'category_id'=> $request->input('category_selected'),
            ]);
            DB::commit();
            toastr()->success('site.added_successfully');
            return redirect()->route('product.index');
//        }
//        catch (\Exception $exception){
//            DB::rollBack();
//            toastr()->error('site.adding_failed');
//            return redirect()->back();
//        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        DB::beginTransaction();
        try {
            $product->name = ucfirst($request->input('name'));
            $product->category_id = $request->input('category_selected');
            $product->save();
            DB::commit();
            toastr()->success('site.deleted_successfully');
            return redirect()->route('product.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            toastr()->error('site.update_failed');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        DB::beginTransaction();
        try {
            if(!$product)
                return false;
            $product->delete();
            DB::commit();
            toastr()->success('site.deleted_successfully');
            return redirect()->route('product.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            toastr()->error('site.delete_failed');
            return redirect()->back();        }
    }

    public function search(Request $request){
        $search = $request->input('search');
        $products = Product::query()
            ->where('name','like','%'.$search.'%')
            ->orwhereHas('category', function ($query) use ($search){
                return $query->where( 'name', 'LIKE', '%' . $search . '%' );
            })
            ->orderBy('id')->get();
        return view(buildView('Suppliers', 'Products', 'search'),compact('products'));
    }
}
