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
        $item = new Item();
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All categories', '');
        return view('items.create', compact('categories', 'item'));
    }

    /**
     * The store controller action is used to process and validate data furnished by the user. Upon submitting of the form, the browser will send a HTTP request to the server, with the data sent to the request body since the form uses POST method, which will be handled by this controller action as defined in the route. The data must respect a set of validation rules specified within this action. If validation check passes, the data will be stored in the database and the user will be redirected to the list of items with a success message. Otherwise, the user will be redirected to the form to provide the necessary data again.
     * @param \Illuminate\Http\Request $request The Request parameter provides access and information related to data provided by the user.
     * @return \Illuminate\Http\RedirectResponse Upon successful validation checks and data processing, the user will be redirected to the list of items with a success message. Otherwise, the user wil be directed back to the form with error messages indicating which validation rules were not met. */
    public function store(Request $request) {
        /* Use the validate function within the $request parameter to set validation rules for data to be supplied by the user.
         * The first argument represents validation rules such as required, unique, and type of data accepted.
         * Validation rules for an attribute are delimited by a pipe symbol, thus one can set as many rules necessary at a time for one attribute.
         * The second argument representing custom message for each validation rule for a particular attribute.
         * Therefore, for one attribute, you can set a custom message for each rule set, such as one for required and another for unique. */
        $request->validate([
            'name' => 'required|unique:items,name',
            'price' => 'required|numeric',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id'
        ], 
        [
            'name.required' => 'Please enter the name of the item',
            'name.unique' => 'An item with the same name already exists!',
            'price.required' => 'Please enter the price of the item',
            'price.numeric' => 'The price must be a number',
            'image_path.image' => 'The file must be an image',
            'image_path.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image_path.max' => 'The image must be smaller than 2MB',
            'category_id.required' => 'Please select a category',
            'category_id.exists' => 'The selected category does not exist'
        ]);

        $itemToCreate = new Item();

        $itemToCreate->name = $request->name;
        $itemToCreate->price = $request->price;
        $itemToCreate->release_date = $request->release_date;
        $itemToCreate->description = trim($request->description);

        //If an image has been uploaded...
        if($request->hasFile('image_path')) {
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

    public function edit($id) 
    {
        $item = Item::find($id);

        if($item != null) {
            $categories = Category::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All categories', '');
            return view('items.edit', compact('categories', 'item'));
        }
        else {
            return redirect()->route('items.index')->with('error', 'We could not find the item. It may have been removed or does not exist. Please try another item.');
        } 
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required|unique:items,name,' . $id,
            'price' => 'required|numeric',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        $itemToUpdate = Item::find($id);

        if($request->hasFile('image_path')) {
            if($itemToUpdate->image_path && file_exists(public_path('images/' . $itemToUpdate->image_path))) {
                unlink(public_path($itemToUpdate->image_path));
            }

            $imageFilename = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageFilename);
            $itemToUpdate->image_path = 'images/' . $imageFilename;
        }

        $itemToUpdate->name = $request->name;
        $itemToUpdate->price = $request->price;
        $itemToUpdate->release_date = $request->release_date;
        $itemToUpdate->description = trim($request->description);
        $itemToUpdate->category_id = $request->category_id;

        $itemToUpdate->save();

        return redirect()->route('items.show', $itemToUpdate->id)->with('success', 'Item updated successfully!');
    }
}