<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
    public function getAll()
    {
        $products = Product::with('category')->get();
            return response($products);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
