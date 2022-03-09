<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Traits\UploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

use App\Product;
use App\Store;


class ProductController extends Controller
{

    use UploadTrait;

    public function index()
    {
        $userStore = auth()->user()->store;
        $products =  $userStore->product()->paginate(10);

        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all(['id', 'name']);

        return view('admin.products.create', ['categories' => $categories]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $store = auth()->user()->store;
        $product = $store->product()->create($data);

        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }

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
        $categories = Category::all(['id', 'name']);

        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();

        $product = Product::findOrFail($product);
        $product->update($data);
        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }

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
