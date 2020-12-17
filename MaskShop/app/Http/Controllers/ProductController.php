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

    public function getProductByName()
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
    
    public function insert(Request $request)
    {
        try {
            $body = $request->validate([
                'name' => 'required|string',
                'price' => 'required',
                'description' => 'required|string',
                'img' => 'required|image',
                'category_id'=>'required'
            ]);
            $imageName = time() . '-' . request()->img->getClientOriginalName(); 
            request()->img->move('images/products', $imageName); 
            $body['image_path'] = $imageName;
            $product = Product::create($body);
        } catch (\Exception $e) {
            return response($e,500);
        }

        return response($product, 201);
    }
    public function uploadImage(Request $request, $id)
    {
        try {
            $request->validate(['img' => 'required|image']);
            $product = Product::find($id); 
            $imageName = time() . '-' . request()->img->getClientOriginalName();
            request()->img->move('images/products', $imageName); 
            $product->update(['image_path' => $imageName]);
            return response($product);
        } catch (\Exception $e) {
            return response([
                'error' => $e,
            ], 500);
        }
    }
    public function modify(Request $request, $id)
    {
        try {
            $body = $request->validate([
                'name' => 'string|max:40',
                'description' => 'string|max:250',
                'category_id' => 'integer'
            ]);
            $product = Product::find($id);
            $product->modify($body);
            return response([
                'message' => 'Producto actualizado con éxito',
                'product' => $product
            ]);
        } catch (\Exception $e) {
            return response([
                'error' => $e
            ], 500);
        }
    }
    public function delete($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            return response([
                'message' => 'Producto eliminado con éxito',
                'product' => $product
            ]);
        } catch (\Exception $e) {
            return response([
                'error' => $e,
            ], 500);
        }
    }
}