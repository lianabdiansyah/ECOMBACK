<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProdukController extends Controller
{
    function addproduk(request $request){
        //  return $request->file('file')->store('produk');
        
        $product = new Product;
        $product->name = $request->input("name");
        $product->file_path = $request->file("file")->store('products');
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->save();
        return $product;
    }
    
    function listproduk(){
        return Product::all();
    }

    function deleteproduk($id){
        $produk = Product::where('id',$id)->delete();
        if ($produk){
            return ["message"=>"berhasil menghapus produk"];
        }
        // return $id;
    }

    function editproduk($id){
        return Product::find($id);
    }
    function updateproduk($id, request $request){
        // return $request->input();
        $product = Product::find($id);
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        if ($request->file('file')){
            $product->file_path = $request->file("file")->store('products');
        }
        $product->save();
        return $product;
    }
    
    function searchproduk($key){
        // return $key;
        return Product::where('name','like',"%$key%")->get();
    }
}
