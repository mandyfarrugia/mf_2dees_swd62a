<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location;

class AuthenticationController extends Controller {
    public function register() {
        $locations = Location::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All locations', '0');
        return view('authentication.register', compact('locations'));
    }

    public function register_post(Request $request) {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'birth_date' => 'required|date|before:' .now()->subYears(18)->addDays(1)->toDateString(),
            'location_id' => 'required|exists:locations,id',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = new User();

        if($request->has('profile_picture')) {
            $imageFilename = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $imageFilename);
            $user->profile_picture = 'profile_pictures/' . $imageFilename;
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->birth_date = $request->birth_date;
        $user->location_id = $request->location_id;
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