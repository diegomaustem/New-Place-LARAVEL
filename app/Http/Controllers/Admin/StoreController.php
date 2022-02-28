<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        // $stores = Store::paginate(10);
        $stores = Store::all();
        return view('admin.stores.index', ['stores' => $stores]);
    }

    public function create()
    {
        $users = User::all(['id', 'name']);
        return view('admin.stores.create', ['users', $users]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['user']);
        $store = $user->store()->create($data);

        return $store;
    }

}
