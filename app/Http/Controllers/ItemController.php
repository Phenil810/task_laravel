<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('items.index', ['items' => $items]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Item::create($request->all());

        return redirect('/items');
    }
}
