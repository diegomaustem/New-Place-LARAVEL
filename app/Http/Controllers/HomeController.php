<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    private $product;

    public function __construct(Product $product)
    {
       $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->limit(10)->orderBy('id', 'DESC')->get();

        return view('welcome', ['products' => $products]);
    }

    public function single($slug)
    {
        $product = $this->product->whereSlug($slug)->first();

        return view('single', ['product' => $product]);
    }
}
