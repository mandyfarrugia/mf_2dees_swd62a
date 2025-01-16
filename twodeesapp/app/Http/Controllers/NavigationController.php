<?php

namespace App\Http\Controllers;

class NavigationController extends Controller {
    public function about() {
        return view('navigation.about');
    }
}
?>