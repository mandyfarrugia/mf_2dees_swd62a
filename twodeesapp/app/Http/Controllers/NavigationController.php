<?php

namespace App\Http\Controllers;

use App\Models\User;

class NavigationController extends Controller {
    public function welcome() {
        return view('welcome');
    }

    public function about() {
        return view('navigation.about');
    }

    public function users() {
        $users = User::all();
        return view('navigation.users', compact('users'));
    }
}
?>