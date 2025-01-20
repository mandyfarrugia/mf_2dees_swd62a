<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        $category = new Category();
        return view('categories.create', compact('category'));
    }
}
?>