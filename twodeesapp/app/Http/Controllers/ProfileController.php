<?php 
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
    public function index($id) {
        $user = User::find($id);

        if($user != null) {
            $region = $user->location->region;

            if($region != null) {
                $country = $region->country;
            }            

            return view('profile.index', compact('user', 'region', 'country'));
        } else {
            return redirect()->route('/')->with('error', 'The profile you are searching for does not exist!');
        }
    }

    public function upload_profile_picture($id) {
        $user = User::find($id);

        if($user != null) {
            return view('profile.upload_profile_picture', compact('user'));
        } else {
            return redirect()->route('/')->with('error', 'The profile you are searching for does not exist!');
        }
    }

    public function process_profile_picture_upload($id, Request $request) {
        $user = User::find($id);

        if($user != null) {
            $request->validate([
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $profile_picture_name = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $profile_picture_name);
            
            $user->profile_picture = 'profile_pictures/' . $profile_picture_name;
            $user->save();

            return redirect()->route('profile.index', $user->id)->with('success', "Your profile picture has been updated! Looking great! \u{1F60A}");
        } else {
            return redirect()->route('/')->with('error', 'The profile you are searching for does not exist!');
        }
    }

    public function remove_profile_picture($id, Request $request) {
        $user = User::find($id);

        if($user != null) {
            if($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }

            $user->profile_picture = null;
            $user->save();

            return redirect()->route('profile.index', $user->id)->with('success', "Your profile picture has been removed! \u{1F622}");
        } else {
            return redirect()->route('/')->with('error', 'The profile you are searching for does not exist!');
        }
    }

    public function change_profile_picture($id) {
        $user = User::find($id);

        if($user != null) {
            return view('profile.change_profile_picture', compact('user'));
        } else {
            return redirect()->route('/')->with('error', 'The profile you are searching for does not exist!');
        }

    }

    public function process_profile_picture_update($id, Request $request) {
        $user = User::find($id);

        if($user != null) {
            $request->validate([
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }

            $profile_picture_name = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $profile_picture_name);
            
            $user->profile_picture = 'profile_pictures/' . $profile_picture_name;
            $user->save();

            return redirect()->route('profile.index', $user->id)->with('success', "Your profile picture has been updated! Looking great! \u{1F60A}");
        } else {
            return redirect()->route('/')->with('error', 'The profile you are searching for does not exist!');
        }
    }

    public function edit($id) {
        $user = User::find($id);
        $locations = Location::orderBy('name', 'asc')->pluck('name', 'id')->prepend('All locations', '');

        if($user != null) {
            return view('profile.edit', compact('user', 'locations'));
        } else {
            return redirect()->route('/')->with('error', 'The profile you are searching for does not exist!');
        }
    }

    public function update($id, Request $request) {
        $user = User::find($id);

        if($user != null) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'username' => 'required|max:255|unique:users,username,' . $id,
                'birth_date' => 'required|date|before:' .now()->subYears(18)->addDays(1)->toDateString(),
                'location_id' => 'required|exists:locations,id',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            if($request->hasFile('profile_picture')) 
            {
                if($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                    unlink(public_path($user->profile_picture));
                }

                $profile_picture_name = time() . '.' . $request->profile_picture->extension();
                $request->profile_picture->move(public_path('profile_pictures'), $profile_picture_name);
                $user->profile_picture = 'profile_pictures/' . $profile_picture_name;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->birth_date = $request->birth_date;
            $user->location_id = $request->location_id;
            $user->bio = trim($request->bio);
            $user->save();

            return redirect()->route('profile.index', $user->id)->with('success', 'Your profile has been updated!');
        } else {
            return redirect()->route('/')->with('error', 'The profile you are searching for does not exist!');
        }
    }
}
?>