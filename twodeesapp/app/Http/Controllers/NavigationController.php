<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class NavigationController extends Controller {
    public function about() {
        return view('navigation.about');
    }
}
?>