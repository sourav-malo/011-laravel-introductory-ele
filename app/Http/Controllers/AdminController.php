<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
  public function destroy(Request $request): RedirectResponse {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    $notification = [
      'alert-type' => 'success',
      'message' => 'Logged out successfully'
    ];

    return redirect('/login')->with($notification);
  }

  public function viewProfile() {
    $id = Auth::user()->id;
    $adminRow = User::find($id);
    return view('admin.admin-profile-view', compact('adminRow'));
  }

  public function editProfile() {
    $id = Auth::user()->id;
    $adminRow = User::find($id);
    return view('admin.admin-profile-edit', compact('adminRow'));
  }

  public function editProfileHandler(Request $request) {
    $id = Auth::user()->id;
    $adminRow = User::find($id);
    
    $adminRow->name = $request->name;
    $adminRow->username = $request->username;
    $adminRow->email = $request->email;

    if($request->file('profile_pic')) {
      $file = $request->file('profile_pic');
      $filename = date('YmdHis') . $file->getClientOriginalName();
      $file->move(public_path('uploads/admin-images'), $filename);
      $adminRow['profile_pic'] = $filename;
    }

    $adminRow->save();

    $notification = [
      'alert-type' => 'success',
      'message' => 'Profile updated successfully'
    ];

    return redirect()->route('admin.profile.view')->with($notification);
  }

  public function changePassword() {
    return view('admin.admin-change-password');
  }

  public function changePasswordHandler(Request $request) {
    $request->validate([
      'cur_password' => 'required',
      'new_password' => 'required',
      'confirm_password' => 'required|same:new_password'
    ]);

    $hashedPassword = Auth::user()->password;

    if(!Hash::check($request->cur_password, $hashedPassword)) {
      session()->flash('message', 'Current password does not match');
      return redirect()->back();
    }

    $adminRow = User::find(Auth::user()->id);
    $adminRow->password = bcrypt($request->new_password);
    session()->flash('message', 'Password successfully changed');
    return redirect()->back();
  }
}
