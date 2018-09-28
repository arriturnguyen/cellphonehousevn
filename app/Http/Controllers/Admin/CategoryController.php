<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\EditCategoryRequest;
use Mockery\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesParent = Category::where('parent_id', 0)->paginate(10);
        return view('admin.pages.categories.index', compact('categoriesParent'));
    }

    public function showChild(Category $category)
    {
        $categoriesChild = $category->children()->paginate(10);
        $categoriesParent = $category;
        return view('admin.pages.categories.showChild', compact('categoriesChild', 'categoriesParent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesParent = Category::where('parent_id', 0)->get();
        return view('admin.pages.categories.create', compact('categoriesParent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        try {
            $data = $request->all();
            $category = Category::create($data);
            if ($category) {
                if ($request->parent_id == 0) {
                    return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.add'));
                } else {
                    return redirect()->route('admin.categories.showChild', $request->parent_id)->with('message', __('category.admin.message.add'));
                }
            } else {
                return redirect()->route('admin.categories.create')->with('message', __('category.admin.message.add_fail'));
            }
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.create')->with('message', __('category.admin.message.add_fail'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categoriesParent = Category::where('parent_id', 0)->get();
        return view('admin.pages.categories.edit', compact('categoriesParent', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        try {
            $category->name = $request->name;
            $category->parent_id = $request->parent_id != null ? $request->parent_id : 0;
            $category->save();
            if ($category) {
                if ($request->parent_id == 0) {
                    return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.edit'));
                } else {
                    return redirect()->route('admin.categories.showChild', $request->parent_id)->with('message', __('category.admin.message.edit'));
                }
            } else {
                return redirect()->route('admin.categories.edit')->with('message', __('category.admin.message.edit_fail'));
            }
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.edit')->with('message', __('category.admin.message.edit_fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            if ($category->parent_id != 0) {
                $childProducts = Product::where('category_id', $category->id)->count();
                if ($childProducts > 0) {
                    return redirect()->route('admin.categories.index')->with('alert', __('category.admin.message.del_no_permit2'));
                } else {
                    $category->delete();
                    if (Category::countChild($category->parent_id)>0) {
                        return redirect()->route('admin.categories.showChild', $category->parent_id)->with('message', __('category.admin.message.del'));
                    } else {
                        return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.del'));
                    }
                }                
            } else {
                if (Category::countChild($category->id)>0) {
                    return redirect()->route('admin.categories.index')->with('alert', __('category.admin.message.del_no_permit'));
                } else {
                    $childProducts = Product::where('category_id', $category->id)->count();
                    if ($childProducts > 0) {
                        return redirect()->route('admin.categories.index')->with('alert', __('category.admin.message.del_no_permit2'));
                    } else {
                        $category->delete();
                    return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.del'));
                    } 
                }
            }
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.del_fail'));
        }
    }
}
