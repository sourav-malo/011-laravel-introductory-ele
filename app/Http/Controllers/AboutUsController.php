<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use Image;
use Illuminate\Support\Str;

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
      $aboutUsImageFilename = 'uploads/about-us-images/'. Str::random(40) . '.' . $aboutUsImageFile->getClientOriginalExtension();
      Image::make($aboutUsImageFile)->resize(636,852)->save($aboutUsImageFilename);
      $oldAboutUsImage = $aboutUsDetails->about_us_image; 
      $aboutUsDetails->about_us_image = $aboutUsImageFilename;
    }

    $oldAboutUsMultiImageFiles = is_null($aboutUsDetails->about_us_multi_images) ? [] : json_decode($aboutUsDetails->about_us_multi_images); 
    $newAboutUsMultiImageFiles = [];
    if($request->file('about_us_multi_images')) {
      $aboutUsMultiImageFiles = $request->file('about_us_multi_images');
      foreach($aboutUsMultiImageFiles as $aboutUsMultiImageFile) {
        $aboutUsMultiImageFilename = 'uploads/about-us-images/'. Str::random(40) . '.' . $aboutUsMultiImageFile->getClientOriginalExtension();
        Image::make($aboutUsMultiImageFile)->resize(220,220)->save($aboutUsMultiImageFilename);
        $newAboutUsMultiImageFiles[] = $aboutUsMultiImageFilename; 
      }
      $aboutUsDetails->about_us_multi_images = json_encode($newAboutUsMultiImageFiles);
    }

    if(!$request->file('about_us_multi_images') && isset($request->about_us_delete_multi_image)) {
      file_exists($oldAboutUsMultiImageFiles[$request->about_us_delete_multi_image]) && unlink($oldAboutUsMultiImageFiles[$request->about_us_delete_multi_image]);
      array_splice($oldAboutUsMultiImageFiles, $request->about_us_delete_multi_image, 1);
      $aboutUsDetails->about_us_multi_images = json_encode($oldAboutUsMultiImageFiles);
    }

    $oldImage = null;
    if(!$request->file('about_us_multi_images')) {
      for($i = 0; $i < count($oldAboutUsMultiImageFiles); $i++) {
        if($request->file("about_us_edit_multi_image_". $i)) {
          $aboutUsMultiImageFile = $request->file("about_us_edit_multi_image_". $i);
          $aboutUsMultiImageFilename = 'uploads/about-us-images/'. Str::random(40) . '.' . $aboutUsMultiImageFile->getClientOriginalExtension();
          Image::make($aboutUsMultiImageFile)->resize(220,220)->save($aboutUsMultiImageFilename);
          $oldImage = $oldAboutUsMultiImageFiles[$i]; 
          $oldAboutUsMultiImageFiles[$i] = $aboutUsMultiImageFilename; 
          $aboutUsDetails->about_us_multi_images = json_encode($oldAboutUsMultiImageFiles);
        }
      }
    }

    $aboutUsDetails->save();
    $request->file('about_us_image') && file_exists($oldAboutUsImage) && unlink($oldAboutUsImage);
    foreach($oldAboutUsMultiImageFiles as $oldAboutUsMultiImageFile) {
      $request->file('about_us_multi_images') && file_exists($oldAboutUsMultiImageFile) && unlink($oldAboutUsMultiImageFile);
    }
    $oldImage && file_exists($oldImage) && unlink($oldImage);

    $notification = [
      'alert-type' => 'success',
      'message' => $request->file('about_us_image') ? "About us updated successfully with image successfully" : "About us updated successfully without image successfully " . $request->about_us_delete_multi_image
    ];

    return redirect()->back()->with($notification);
  }
}
