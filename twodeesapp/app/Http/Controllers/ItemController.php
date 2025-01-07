<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index() {
        $categories = Category::all()->pluck('name', 'id');
        $items = Item::all();
        return view('items.index', compact('items', 'categories'));
    }

    public function create() {
        return view('items.create');
    }

    public function show($id) {
        $item = Item::find($id);
        return view('items.show', compact('item'));
    }
}
