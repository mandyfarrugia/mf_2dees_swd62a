<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function index($id) {
        $user = User::where('id', $id)->first();
        return view('profile.index', compact('user'));
    }
}
?>