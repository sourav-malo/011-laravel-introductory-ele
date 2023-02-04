<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;
use Image;

class HomeBannerController extends Controller
{
  public function editHomeBanner() {
    $homeBannerDetails = HomeBanner::find(1);

    return view('admin.home-banner.edit', compact('homeBannerDetails')); 
  }

  public function editHomeBannerHandler(Request $request) {
    $id = $request->id;
    $bannerDetails = HomeBanner::find($id);
    
    $bannerDetails->title = $request->title;
    $bannerDetails->short_text = $request->short_text;
    $bannerDetails->video_url = $request->video_url;

    if($request->file('banner_img')) {
      $bannerImageFile = $request->file('banner_img');
      $bannerImageFilename = date('YmdHis') . $bannerImageFile->getClientOriginalName();
      Image::make($bannerImageFile)->resize(636,852)->save('uploads/banner-images/'. $bannerImageFilename);
      $bannerDetails->banner_img = $bannerImageFilename;
    }

    $bannerDetails->save();

    $notification = [
      'alert-type' => 'success',
      'message' => "Home banner updated successfully ". $request->file('banner_img') ? 'with' : 'without' ." image"
    ];

    return redirect()->back()->with($notification);
  }
}
