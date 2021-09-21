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
        $product->file_path = $request->file("file_path")->store('produk');
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->save();
        return $product;
    }
}
