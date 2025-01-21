<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function index($id) {
        $user = User::find($id);
        return view('profile.show', compact('user'));
    }
}
?>