<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{

    function CreateProduct(Request $request)
    {
        try {
            $user_id = Auth::id();

            // dd($request->all());
            $request->validate([
                'name' => 'required|string|max:50',
                'price' => 'required|string|max:50',
                'unit' => 'required|string|max:11',
                'category_id' => 'required|string',
                'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //Prepare file name and path
            $img = $request->file('img');


            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";


            //Upload Files
            $img->move(public_path('uploads'), $img_name);

            Product::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'unit' => $request->input('unit'),
                'img_url' => $img_url,
                'category_id' => $request->input('category_id'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function DeleteProduct(Request $request)
    {
        try {
            $user_id = Auth::id();
            $request->validate([
                "id" => 'required|string',
            ]);

            $product_id = $request->input('id');
            $filePath = $request->input('file_path');
            File::delete($filePath);
            Product::where('id', $product_id)->where('user_id', $user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function ProductByID(Request $request)
    {
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);
            $rows = Product::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function ProductList(Request $request)
    {
        try {
            $user_id = Auth::id();
            $rows = Product::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function UpdateProduct(Request $request)
    {
        try {
            $user_id = Auth::id();
            $product_id = $request->input('id');

            if ($request->hasFile('img')) {
                $request->validate([
                    'name' => 'required|string|max:50',
                    'price' => 'required|string|max:50',
                    'unit' => 'required|string|max:11',
                    'category_id' => 'required|string',
                    'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                //Prepare file name and path
                $img = $request->file('img');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/{$img_name}";
                $img->move(public_path('uploads'), $img_name);

                $filePath = $request->input('file_path');
                File::delete($filePath);


                //update
                Product::where('id', $product_id)->where('user_id', $user_id)->update([
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'unit' => $request->input('unit'),
                    'img_url' => $img_url,
                    'category_id' => $request->input('category_id'),
                ]);
            } else {
                Product::where('id', $product_id)->where('user_id', $user_id)->update([
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'unit' => $request->input('unit'),
                    'category_id' => $request->input('category_id'),
                ]);
            }

            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }
}
