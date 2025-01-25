<?php 
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;

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

            $profile_picture = $request->file('profile_picture');
            $profile_picture_name = time() . '.' . $request->profile_picture->extension();
            $profile_picture->move(public_path('profile_pictures'), $profile_picture_name);
            
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
            if(file_exists(public_path($user->profile_picture))) {
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

            if(file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }

            $profile_picture = $request->file('profile_picture');
            $profile_picture_name = time() . '.' . $request->profile_picture->extension();
            $profile_picture->move(public_path('profile_pictures'), $profile_picture_name);
            
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
}
?>