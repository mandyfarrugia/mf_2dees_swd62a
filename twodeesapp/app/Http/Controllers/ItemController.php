<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index() {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All categories', '');

        $items = Item::query();

        if(request('category_id') != 0) {
            $items->where('category_id', request('category_id'));
        }

        if(request('date') != null) {
            $items->orderBy('release_date', request('date'));
        }

        if(request('min_price') != '' && request('max_price') != '') {
            $items->whereBetween('price', [request('min_price'), request('max_price')]);
        }

        $items = $items->get();

        return view('items.index', compact('items', 'categories'));
    }

    public function create() {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All categories', '');
        return view('items.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        dd($request->all());
    }

    public function show($id) {
        $item = Item::find($id);
        return view('items.show', compact('item'));
    }
}
