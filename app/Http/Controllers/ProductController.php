<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      
        $products = Product::orderBy('created_at', 'ASC')->get();
            return view('products.list', [
            'products' => $products
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {


            // Validation rules
            $rules = [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:1',
            ];

            // Create a validator instancephp 
            $validator = Validator::make($request->all(), $rules);

            // Check if validation fails
            if ($validator->fails()) {
                // If validation fails, redirect back with input and errors
                return redirect()->back()->withInput()->withErrors($validator);
            }


            // If validation passes, continue with storing the data
            // Process the validated data

            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();

            return redirect()->route('products.list')->withSuccess('Your product added successfully');

           
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::FindOrFail($id);
        return view('products.edit',[
            'products' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = Product::FindOrFail($id);


        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1',
        ];

        // Create a validator instancephp 
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // If validation fails, redirect back with input and errors
            return redirect()->back()->withInput()->withErrors($validator);
        }


        // If validation passes, continue with storing the data
        // Process the validated data

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('products.list')->withSuccess('Your product Update successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $product = Product::FindOrFail($id);

        $product->delete();
        return redirect()->route('products.list')->withSuccess('Product Delete Successfullly');

    }
}
