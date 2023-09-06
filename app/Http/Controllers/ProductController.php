<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //* Functions for views
    public function index(){
        $products = Product::all();
        return view("products.products" , compact("products"));
    }

    public function create(){
        return view("products.partials.create");
    }

    public function edit(Product $product){
        return view("products.partials.edit" , compact("product"));
    }

    public function show(Product $product){
        return view("products.partials.show" , compact("product"));
    }

    //* Functions for database 
    public function store(Request $request){
        request()->validate([
            "name" => ["required"],
            "price" => ["required"],
            "stock" => ["required"],
            "img" => ["required"],
        ]);

        $data = [
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
            "img" => $request->img,
        ];

        Product::create($data);
        return redirect()->route("products.index");
    }

    public function update(Request $request, Product $product){
        request()->validate([
            "name" => ["required"],
            "price" => ["required"],
            "stock" => ["required"],
            "img" => ["required"],
        ]);

        $data = [
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
            "img" => $request->img,
        ];

        $product->update($data);

        return redirect()->route("products.index");
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->back();
    }
}
