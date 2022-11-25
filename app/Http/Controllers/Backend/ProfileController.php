<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView()
    /*
    Route::get('member/{id}, ')
    public funcion member($id){
        $member = Prospest::where('id',$id)->firts();
        return view('member', compact('member'));
    }*/
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        return view('backend/user.view_profile', compact('user'));
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = User::findOrFail($id);

        return view('backend/user.edit_profile', compact('editData'));
    }

    public function ProfileStore(Request $request)
    {

        $data = User::find(Auth::user()->id); //Find the user id then pick all the set parameters
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_image/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_image'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);
    }

    public function PasswordView()
    {
        return view('backend/user.edit_password');
    }

    public function PasswordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);

            $user->save();
            Auth::logout();

            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }
}
