<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $paniers = Panier::all();
        return view("home" , compact("products" , "paniers"));
    }
}
