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

        $categories = $categories->get();

        return view('categories.index', compact('categories'));
    }

    public function create() {
        $category = new Category();
        return view('categories.create', compact('category'));
    }
}
?>