<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function store(Request $request)
    {
        $input=$request->all();
            $rules=[
                'name'=>'required',
                'description'=>'required',
                'price'=>'required',
                'image_path'=>'required',
            ];
            $messages=[
                'name.required'=>'The name field is empty.',
                'price.required'=>'The price field is empty.',
                'description.required'=>'The description field is empty.',
                'image_path.required'=>'The image field is empty.',
    
            ];
            $validator = Validator::make($input, $rules,$messages);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }else{
                $product = Product::create($input);
                return response($product);
            }
    }
    public function update(Request $request, $id)
    {
        try {
            $body = $request->all();
            $product = Product::find($id);
            $product->update($body);
            return response(['message' => 'Product sucessfully updated.','product' => $product]);
        } catch (\Exception $e) {
            return response(['message' => 'There was a problem trying to update the product.'], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $deleted = Product::whereId($id)->delete();
            if ($deleted)
                return response()->json(['message' => 'Product deleted succesfully.'], 200);
            else
                return response()->json(['message' => 'Nothing to delete.'], 200);
            } catch (\Exception $e) {
                return response()->json($e, 400);
            }
    }
}