<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index(){
        $paniers = Panier::all();
        $products = Product::all();
        return view("paniers.paniers" , compact("paniers" , "products"));
    }

    public function addFromProduct(Product $product){
        $exist = Panier::where("product" , $product->name)->first();
        
        if ($exist) {
            $exist->number += 1;
            $exist->save();
            
            $product->stock -= 1;
            $product->save();
        } else {
            $data = [
                "product" => $product->name,
                "number" => 1
            ];
            Panier::create($data);

            $product->stock -= 1;
            $product->save();
        }
        return redirect()->back();
    }

    public function removeFromPanier(Panier $panier){

        if ($panier->number > 1) {
            $panier->number -= 1;
            $panier->save();
        } else if ($panier->number === 1) {
            $panier->delete();
        }

        $product = Product::where("name" , $panier->product)->first();
        $product->stock +=1 ;
        $product->save();

        return redirect()->back();
    }
}
