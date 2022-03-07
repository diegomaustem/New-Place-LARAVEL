<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
    }

    public function index()
    {
        $store = auth()->user()->store;

        return view('admin.stores.index', ['store' => $store]);
    }

    public function create()
    {
        $users = User::all(['id', 'name']);

        return view('admin.stores.create', ['users' => $users]);
    }

    public function store(StoreRequest $request)
    {

        $data = $request->all();

        $user = auth()->user();

        $store = $user->store()->create($data);

        flash('Loja criada.')->success();

        return redirect()->route('admin.stores.index');
    }

    public function edit($store)
    {
        $store = Store::find($store);

        return view('admin.stores.edit', ['store' => $store]);
    }

    public function update(StoreRequest $request, $store)
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
        $store = Store::findOrFail($store);
        $store->delete();

        flash('Loja Removida.')->success();
        return redirect()->route('admin.stores.index');
    }

}
