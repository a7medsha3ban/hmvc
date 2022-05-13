<?php

namespace Admins\Http\Controllers\Categories\backend;

use Admins\Http\Requests\Categories\StoreCategoryRequest;
use Admins\Http\Requests\Categories\UpdateCategoryRequest;
use Admins\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function store(StoreCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $category = Category::create([
                'name'=> ucfirst($request->input('name')),
            ]);
            DB::commit();
            toastr()->success('site.added_successfully');
            return redirect()->route('category.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            toastr()->error('site.adding_failed');
            return redirect()->back();
        }
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        DB::beginTransaction();
        try {
            $category->name = ucfirst($request->input('name'));
            $category->save();
            DB::commit();
            toastr()->success('site.deleted_successfully');
            return redirect()->route('category.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            toastr()->error('site.update_failed');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        DB::beginTransaction();
        try {
            if(!$category)
                return false;
            $category->delete();
            DB::commit();
            toastr()->success('site.deleted_successfully');
            return redirect()->route('category.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            toastr()->error('site.delete_failed');
            return redirect()->back();        }
    }

    public function search(Request $request){
        $search = $request->input('search');
        $categories = Category::where('name','like','%'.$search.'%')->orderBy('id')->paginate(5);
        return view(buildView('Admins', 'Categories', 'search'),compact('categories'));
    }
}
