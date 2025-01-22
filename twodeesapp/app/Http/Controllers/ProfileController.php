<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function index($id) {
        $user = User::where('id', $id)->first();

        if($user != null) {
            return view('profile.index', compact('user'));
        } else {
            return redirect()->route('/')->with('error', 'The profile you are searching for does not exist!');
        }
    }
}
?>