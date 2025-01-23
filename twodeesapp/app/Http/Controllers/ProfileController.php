<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
?>