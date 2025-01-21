<?php 

namespace App\Http\Controllers;

use App\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;

class AuthenticationController extends Controller {
    public function register() {
        return view('authentication.register');
    }

    public function register_post(Request $request) {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'username' => 'required|unique:users,username',
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

        return redirect()->route('authentication.login')->with('success', 'You have successfully registered!');
    }

    public function login() {
        return view('authentication.login');
    }

    public function authenticate(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return redirect()->route('/')->with('success', 'You have successfully logged in!');
        }
        else {
            return back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('/')->with('success', 'You have successfully logged out!');
    }
}
?>