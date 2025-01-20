<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthenticationController extends Controller {
    public function register() {
        return view('authentication.register');
    }
}
?>