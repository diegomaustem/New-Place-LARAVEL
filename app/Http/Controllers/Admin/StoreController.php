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
        $stores = Store::paginate(10);

        return view('admin.stores.index', ['stores' => $stores]);
    }

    public function create()
    {
        $users = User::all(['id', 'name']);

        return view('admin.stores.create', ['users' => $users]);
    }

    public function store(Request $request)
    {

        $data = $request->all();

        $user = User::where('name', $data['user'])->first();
        $store = $user->store()->create($data);

        flash('Loja criada.')->success();

        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = Store::find($store);

        return view('admin.stores.edit', ['store' => $store]);
    }

    public function update(Request $request, $store)
    {
        $data = $request->all();

        $store = json_decode($store);
        $store = Store::find($store);
        $store->update($data);

        flash('Loja Atualizada.')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = Store::find($store);
        $store->delete();

        flash('Loja Removida.')->success();
        return redirect()->route('admin.stores.index');
    }

}
