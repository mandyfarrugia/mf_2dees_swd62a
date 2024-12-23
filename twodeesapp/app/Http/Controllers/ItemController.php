<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index() {
        return view('items.index');
    }

    public function create() {
        return view('items.create');
    }

    public function show($id) {
        $item = Item::find($id);
        return view('items.show', compact('item'));
    }
}
