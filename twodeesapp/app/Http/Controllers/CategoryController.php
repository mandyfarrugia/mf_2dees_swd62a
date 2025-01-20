<?php 

namespace App\Http\Controllers;

use Illuminate\Events\NullDispatcher;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::query();

        if(request('category') != null) {
            $categories->orderBy('name', request('category'));
        }

        if(request('search') != null) {
            $categories->where('name', 'like', '%' . request('search') . '%');
        }

        $categories = $categories->get();

        return view('categories.index', compact('categories'));
    }

    public function create() {
        $category = new Category();
        return view('categories.create', compact('category'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ], 
        [
            'name.required' => 'Please enter the name of the category!',
            'name.unique' => 'A category with the same name already exists!',
            'image_path.image' => 'The file must be an image',
            'image_path.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image_path.max' => 'The image must be smaller than 2MB'
        ]);

        $categoryToCreate = new Category();

        $categoryToCreate->name = $request->name;

        //If an image has been uploaded...
        if($request->hasFile('image_path')) {
            $imageFilename = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageFilename);
            $categoryToCreate->image_path = 'images/' . $imageFilename;
        }
    
        $categoryToCreate->save();

        return redirect()->route('categories.index')->with('success', 'Item uploaded successfully!');
    }

    public function edit() {
        $category = Category::find(request('id'));
        return view('categories.edit', compact('category'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $categoryToUpdate = Category::find($id);

        if($request->hasFile('image_path')) {
            if($categoryToUpdate->image_path && file_exists(public_path($categoryToUpdate->image_path))) {
                unlink(public_path($categoryToUpdate->image_path));
            }

            $imageFilename = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images'), $imageFilename);
            $categoryToUpdate->image_path = 'images/' . $imageFilename;
        }

        $categoryToUpdate->name = $request->name;

        $categoryToUpdate->save();

        return redirect()->route('categories.index')->with('success', 'Item updated successfully!');
    }

    public function destroy($id) {
        $categoryToDelete = Category::find($id);

        if($categoryToDelete->image_path && file_exists(public_path($categoryToDelete->image_path))) {
            unlink(public_path($categoryToDelete->image_path));
        }

        $categoryToDelete->delete();

        return back()->with('success', 'Item deleted successfully!');
    }
}
?>