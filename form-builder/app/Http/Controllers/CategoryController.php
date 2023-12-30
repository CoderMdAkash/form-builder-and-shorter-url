<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Services\CategoryServices;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        $organization = Organization::all();
        return view('categories.create',['organization'=>$organization]);
    }

    public function store(StoreCategoryRequest $request,CategoryServices $categoryServices)
    {
        $categoryServices->store(
            $request->validated()
        );
        return redirect()->route('categories.index')->with(['success' => 'Category created']);
    }

    public function edit(Category $category)
    {
        $organization = Organization::all();
        return view('categories.edit', ['category' => $category,'organization'=>$organization]);
    }

    public function update(StoreCategoryRequest $request, Category $category,CategoryServices $categoryServices)
    {
        $categoryServices->update(
            $category,
            $request->validated()
        );
        return redirect()->route('categories.index')->with(['success' => 'Category updated']);
    }

    public function destroy(Category $category,CategoryServices $categoryServices)
    {
        $categoryServices->destroy($category);
        return response('Field deleted');
    }
}
