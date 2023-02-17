<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller {
  public function edit() {
    $footerDetails = Footer::find(1);

    return view('admin.footer.edit', compact('footerDetails')); 
  }

  public function update(Request $request) {
    $request->validate([
      'phone_num' => 'nullable|max:255',
      'contact_us_desc' => 'nullable|max:255',
      'country' => 'nullable|max:255',
      'address' => 'nullable|max:255',
      'email' => 'nullable|email|max:255',
      'socially_connect_desc' => 'nullable|max:255',
      'facebook_url' => 'nullable|url|max:255',
      'twitter_url' => 'nullable|url|max:255',
      'behance_url' => 'nullable|url|max:255',
      'linkedin_url' => 'nullable|url|max:255',
      'instagram_url' => 'nullable|url|max:255'
    ]);

    Footer::findOrFail(1)->update([
      'phone_num' => $request->phone_num, 
      'contact_us_desc' => $request->contact_us_desc,
      'country' => $request->country,
      'address' => $request->address, 
      'email' => $request->email, 
      'socially_connect_desc' => $request->socially_connect_desc, 
      'facebook_url' => $request->facebook_url, 
      'twitter_url' => $request->twitter_url, 
      'behance_url' => $request->behance_url,
      'linkedin_url' => $request->linkedin_url,
      'instagram_url' => $request->instagram_url 
    ]);

    $notification = [
      'alert-type' => 'success',
      'message' => "Footer details updated successfully"    
    ];

    return redirect()->route('footer.edit')->with($notification);
  }
}
