<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //AFFICHER LE PROFIL
    public function index() {
        $id = auth()->id();
        $user = DB::table('users')
                        ->select('users.id', 'users.lastname', 'users.firstname', 'users.nickname', 'users.email', 'users.image', 'users.wish1', 'users.wish2', 'users.wish3', 'users.wish4', 'users.wish5')
                        ->where('users.id', '=', $id)
                        ->get();
        return view('profile/index', compact('user'));
    }

    //MISE A JOUR DU PROFIL
    public function update(Request $request, $id) {
        $updateProfile = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'nickname' => 'required',
            'email' => 'required'
        ]);
        $updateProfile = $request->except(['_token', '_method']);

        if ($request->image) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $updateProfile['image'] = '/images/' . $imageName;
        }
        
        User::whereId($id)->update($updateProfile);
        return back()->with('success', 'Profil modifié !');
    }
}
