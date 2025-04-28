<?php

namespace App\Http\Controllers;

class NavigationController extends Controller {
    public function welcome() {
        return view('welcome');
    }

    public function about() {
        return view('navigation.about');
    }

    public function users() {
        return view('navigation.users');
    }
}
?>