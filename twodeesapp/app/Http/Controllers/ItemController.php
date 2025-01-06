<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index() {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create() {
        return view('items.create');
    }

    public function show($id) {
        $item = Item::find($id);
        return view('items.show', compact('item'));
    }
}
