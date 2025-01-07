<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index() {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All categories', '');

        if(request('category_id') == null) {
            $items = Item::all();
        } else {
            $items = Item::where('category_id', request('category_id'))->get();
        }
        
        //$items = Item::paginate(1);
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
