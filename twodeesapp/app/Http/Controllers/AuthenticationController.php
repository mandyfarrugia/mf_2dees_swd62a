<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthenticationController extends Controller {
    public function register() {
        return view('authentication.register');
    }

    public function register_post(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = new User();

        if($request->has('profile_picture')) {
            $imageFilename = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $imageFilename);
            $user->profile_picture = 'profile_pictures/' . $imageFilename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('/')->with('success', 'You have successfully registered!');
    }
}
?>