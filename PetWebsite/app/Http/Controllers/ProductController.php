<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController
{
    public function index()
    {
        // Retrieve all products
        $products = Product::all();
        // Return products as JSON
        return response()->json($products);
    }

    public function show($id)
    {
        // Find the product by its ID
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            // Handle the case where the product is not found (e.g., show a 404 error)
            abort(404);
        }

        // Load a view to display the product details
        return view('products.show', ['product' => $product]);
    }
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {

        $validatedData = $request->validate(
            [
                'sku'=>['required','String', Rule::unique('products', 'sku')],
                'name'=>['required','String'],
                'description'=>['required','String'],
                'price'=>['required','String'],
                'brand'=>['required','String'],
                'image_path'=>['required','String'],
                'stock'=>['required','Integer'],
                'category'=>['required','String'],
                'ingredients'=>['nullable','String'],
            ]
        );


        $product =Product::create([
            'sku'=>$validatedData['sku'],
            'name'=>$validatedData['name'],
            'description'=>$validatedData['description'],
            'price'=>$validatedData['price'],
            'brand'=>$validatedData['brand'],
            'image_path'=>$validatedData['image_path'],
            'stock'=>$validatedData['stock'],
            'category'=>$validatedData['category'],
            'ingredients'=>$validatedData['ingredients'],
        ]);
        return response()->json(['message' => 'Product created successfully'], 201);
    }

    public function update(Request $request,$id): \Illuminate\Http\JsonResponse
    {
        $product = Product::find($id);
        $validatedData = $request->validate(
            [
                'sku'=>['required','String'],
                'name'=>['required','String'],
                'description'=>['required','String'],
                'price'=>['required','String'],
                'brand'=>['required','String'],
                'image_path'=>['required','String'],
                'stock'=>['required','Integer'],
                'category'=>['required','String'],
                'ingredients'=>['nullable','String'],
            ]
        );

        $product->update($validatedData);
        return response()->json(['message' => 'Product created successfully'], 201);
    }

    public function destroy($id){
        $product = Product::find($id);
        if(!$product){
            return response() ->json(["message"=>"Product not found"],404);
        }
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
