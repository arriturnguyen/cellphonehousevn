<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all product
        //DB::enableQueryLog();
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        // dd($products);
        return view('products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function showProductByCategory(Product $product, Category $category)
    {
        $categoryId = $category->id;
        // dd($categoryId);
        $subCategoryIds = Category::where('parent_id', $categoryId)->pluck('id');
        // dd($subCategoryIds);
        if (($category->parent_id) == 0) {
            $products = Product::whereIn('category_id', $subCategoryIds)->paginate(12);
        } else {
            $products = Product::where('category_id', $categoryId)->paginate(12);
        }
        
        // dd($products);
        return view('products/index', compact('products'));
    }

    public function searchByName(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->value . '%')->get();

        return response()->json($products); 
    }
}
