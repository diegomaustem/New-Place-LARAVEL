<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

use App\Product;
use App\Store;


class ProductController extends Controller
{
    /*private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }*/

    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index', ['products' => $products]);
    }


    public function create()
    {
        $stores = Store::all(['id', 'name']);

        return view('admin.products.create', ['stores' => $stores]);
    }


    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $store = Store::findOrFail($data['store']);
        $store->product()->create($data);

        flash('Produto criado.')->success();

        return redirect()->route('admin.products.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($product)
    {
        $product = Product::findOrFail($product);

        return view('admin.products.edit', ['product' => $product]);
    }


    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();

        $product = Product::findOrFail($product);
        $product->update($data);

        flash('Produto Atualizado.')->success();

        return redirect()->route('admin.products.index');
    }


    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();

        flash('Produto Deletado.')->success();

        return redirect()->route('admin.products.index');
    }
}
