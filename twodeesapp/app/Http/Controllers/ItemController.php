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

        if(request('category_id') != null) {
            $items->where('category_id', request('category_id'));
        }

        if(request('release_date') != null) {
            $items->orderBy('release_date', request('release_date'));
        }

        if(request('item') != null) {
            $items->orderBy('name', request('item'));
        }

        if(request('price') != null) {
            $items->orderBy('price', request('price'));
        }

        if(request('min_price') != null && request('max_price') != null) {
            $items->whereBetween('price', [request('min_price'), request('max_price')]);
        }

        if(request('search') != null) {
            $items->where('name', 'like', '%' . request('search') . '%');
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
            'name' => 'required|unique:items,name',
            'price' => 'required|numeric',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        $itemToCreate = new Item();

        $itemToCreate->name = $request->name;
        $itemToCreate->price = $request->price;
        $itemToCreate->release_date = $request->release_date;
        $itemToCreate->description = $request->description;

        //If an image has been uploaded...
        if($request->image_path != null) {
            $imageFilename = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageFilename);
            $itemToCreate->image_path = 'images/' . $imageFilename;
        }
    
        $itemToCreate->category_id = $request->category_id;
        $itemToCreate->save();

        return redirect()->route('items.index')->with('success', 'Item uploaded successfully!');
    }

    public function show($id) {
        $item = Item::find($id);
        return view('items.show', compact('item'));
    }
}