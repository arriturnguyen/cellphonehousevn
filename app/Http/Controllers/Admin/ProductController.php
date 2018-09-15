<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\CreateProductRequest;


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
        $products = Product::all();
        return view('admin/pages/products/index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        try 
        {

            if ($request->hasFile('image')) 
            {
                
                $imageData = [];
                foreach (request()->file('image') as $image) 
                {
                    $filename = $image->getClientOriginalName();
                    $newFilename = '/images/products/'.round(microtime(true)).rand(0,99999).$filename;
                    $image->move(public_path('/images/products/'), $newFilename);
                    array_push($imageData, $newFilename);
                }
                $images = json_encode($imageData);
                // dd($images);
                $productData = $request->all();
                $productData['images']= $images;
                // dd($productData);
                Product::create($productData);
            }
            return redirect()->route('admin.products.index')->with('message', __('product.admin.create.create_success'));
        } catch (Exception $ex) 
            {
                return redirect()->route('admin.products.index')->with('alert', __('product.admin.create.create_fail'));
            }

        //dd(public_path());
        // dd($request->images->store('products'));

        // if($request->hasFile('image'))
        // {
        //     $names = [];
        //     foreach($request->file('image') as $image)
        //     {
        //         $destinationPath = 'products/';
        //         $filename = $image->getClientOriginalName();
        //         $image->move($destinationPath, $filename);
        //         array_push($names, $filename);          
        //     }
        //     $product->image = json_encode($names)
        // }

        //     if($request->hasFile('images'))
        // {
        //     $request->images->store('products');
        // }
        
        // $productData = $request->all();
        // Product::create($productData);
        // return redirect()->route('admin.products.index')->with('message', __('product.admin.create.create_success'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.pages.products.show')
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
        return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try 
        {
            if ($request->hasFile('image')) 
            {
                $imageData = [];
                foreach (request()->file('image') as $image) 
                {
                    $filename = $image->getClientOriginalName();
                    $newFilename = '/images/products/'.round(microtime(true)).rand(0,99999).$filename;
                    $image->move(public_path('/images/products/'), $newFilename);
                    array_push($imageData, $newFilename);
                }
                $images = json_encode($imageData);
                
                $updateProduct = $request->except(["_token", "_method", "submit"]);
                $updateProduct['images']= $images;
                
                $product->update($updateProduct);
            }
           
            return redirect()->route('admin.products.index')->with('message', __('product.admin.edit.update_success'));
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('alert', __('product.admin.edit.update_fail'));
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('admin.products.index')->with('message', __('product.admin.delete_success'));
        } catch (Exception $e) {
            return redirect()->route('admin.products.index')->with('alert', __('product.admin.delete_fail'));
        }
    }
}
