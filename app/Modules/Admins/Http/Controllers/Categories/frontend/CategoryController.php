<?php

namespace Admins\Http\Controllers\Categories\frontend;

use Admins\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    //function to return index view
    public function index()
    {
        $categories = Category::all();
        return view(buildView('Admins', 'Categories', 'index'),compact('categories'));
    }

    //function to show specific category
    public function show($id)
    {
        $category = Category::find($id);
        return view(buildView('Admins', 'Categories', 'show'),compact('category'));

    }

    //function to return create view
    public function create()
    {
        return view(buildView('Admins', 'Categories', 'create'));

    }

    //function to return edit view
    public function edit($id)
    {
        $category = Category::find($id);
        return view(buildView('Admins', 'Categories', 'edit'),compact('category'));

    }

}
