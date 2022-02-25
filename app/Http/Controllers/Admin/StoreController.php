<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {

        // $stores = Store::paginate(10);
           $stores = Store::all();

        return view('admin.stores.index', ['stores' => $stores]);
    }
}
