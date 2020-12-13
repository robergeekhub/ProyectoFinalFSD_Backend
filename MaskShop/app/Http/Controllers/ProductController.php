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

    public function getId()
    {
        $product = Product::with('category')->find($id);
            return response($product);
    }

    public function getName()
    {
        $product = Product::with('category')->find($name);
            return response($product);
    }

    public function getPriceUpward()
    {
        $products = Product::orderBy('price','upward')->get();
            return response($products);
    }

    public function getPriceDescendent()
    {
        $products = Product::orderBy('price','descendent')->get();
            return response($products);
    }
    
}
