<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index() {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All categories', '0');

        if(request('category_id') == 0) {
            $items = Item::all();

            if(request('date') != null) {
                $items = Item::orderBy('release_date', request('date'))->get();
            }
        } else {
            $items = Item::where('category_id', request('category_id'))->get();

            if(request('date') != null) {
                $items = Item::where('category_id', request('category_id'))->orderBy('release_date', request('date'))->get();
            }
        }

        return view('items.index', compact('items', 'categories'));
    }

    public function create() {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All categories', '');
        return view('items.create', compact('categories'));
    }

    public function show($id) {
        $item = Item::find($id);
        return view('items.show', compact('item'));
    }
}
