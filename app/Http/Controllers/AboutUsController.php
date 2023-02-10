<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use Image;

class AboutUsController extends Controller
{
  public function editAboutUs() {
    $aboutUsDetails = AboutUs::find(1);

    return view('admin.about-us.edit', compact('aboutUsDetails')); 
  }

  public function viewAboutUs() {
    $aboutUsDetails = AboutUs::find(1);

    return view('frontend.about-us', compact('aboutUsDetails')); 
  }

  public function editAboutUsHandler(Request $request) {
    $id = $request->id;
    $aboutUsDetails = AboutUs::find($id);
    
    $aboutUsDetails->title = $request->title;
    $aboutUsDetails->short_title = $request->short_title;
    $aboutUsDetails->short_description = $request->short_description;
    $aboutUsDetails->long_description = $request->long_description;

    if($request->file('about_us_image')) {
      $aboutUsImageFile = $request->file('about_us_image');
      $aboutUsImageFilename = date('YmdHis') . $aboutUsImageFile->getClientOriginalName();
      Image::make($aboutUsImageFile)->resize(636,852)->save('uploads/about-us-images/'. $aboutUsImageFilename);
      $aboutUsDetails->about_us_image = $aboutUsImageFilename;
    }

    $aboutUsDetails->save();

    $notification = [
      'alert-type' => 'success',
      'message' => "About us updated successfully ". $request->file('about_us_image') ? 'with' : 'without' ." image"
    ];

    return redirect()->back()->with($notification);
  }
}
