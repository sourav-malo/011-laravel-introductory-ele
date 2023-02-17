<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Portfolio;
use Image;

class PortfolioController extends Controller {
  public function index() {
    $portfolios = Portfolio::latest()->get();

    return view('admin.portfolios.index', compact('portfolios')); 
  }

  public function indexUser() {
    $portfolios = Portfolio::paginate(4);

    return view('frontend.portfolios.index', compact('portfolios')); 
  }

  public function create() {
    return view('admin.portfolios.create'); 
  }

  public function store(Request $request) {
    $request->validate([
      'title' => 'required|max:255|unique:portfolios',
      'sub_title' => 'required|max:255',
      'image' => 'nullable|image|max:512',
      'description' => 'nullable|max:65535'
    ]);
    
    $imagePath = null;
    if($request->file('image')) {
      $imageFile = $request->file('image');
      $imageFilename = 'uploads/portfolio-images/'. Str::random(40) . '.' . $imageFile->getClientOriginalExtension();
      Image::make($imageFile)->resize(1020,519)->save($imageFilename);
      $imagePath = $imageFilename; 
    }

    Portfolio::create([
      'title' => $request->title,
      'sub_title' => $request->sub_title,
      'image' => $imagePath,
      'description' => $request->description,
    ]);

    $notification = [
      'alert-type' => 'success',
      'message' => "Portfolio created successfully"    
    ];

    return redirect()->route('portfolios.index')->with($notification);
  }

  public function edit($id) {
    $portfolio = Portfolio::findOrFail($id);

    return view('admin.portfolios.edit', compact('portfolio'));
  }
  
  public function update($id, Request $request) {
    $request->validate([
      'title' => 'required|max:255|unique:portfolios,title,'. $id,
      'sub_title' => 'required|max:255',
      'image' => 'nullable|image|max:512',
      'description' => 'nullable|max:65535'
    ]);

    $portfolio = Portfolio::findOrFail($id);

    $portfolio->title = $request->title;
    $portfolio->sub_title = $request->sub_title;
    $portfolio->description = $request->description;
    
    $oldImagePath = null;
    if($request->file('image')) {
      $imageFile = $request->file('image');
      $imageFilename = 'uploads/portfolio-images/'. Str::random(40) . '.' . $imageFile->getClientOriginalExtension();
      Image::make($imageFile)->resize(1020,519)->save($imageFilename);
      $oldImagePath = $portfolio->image; 
      $portfolio->image = $imageFilename; 
    }

    $portfolio->save();
    $request->file('image') && !is_null($oldImagePath) && unlink($oldImagePath); 

    $notification = [
      'alert-type' => 'success',
      'message' => "Portfolio updated successfully"    
    ];

    return redirect()->route('portfolios.index')->with($notification);
  }

  public function destroy($id) {
    $portfolio = Portfolio::findOrFail($id);

    $portfolio->delete();
    !is_null($portfolio->image) && unlink($portfolio->image); 

    $notification = [
      'alert-type' => 'success',
      'message' => "Portfolio deleted successfully"    
    ];

    return redirect()->back()->with($notification);
  }

  public function show($id) {
    $portfolio = Portfolio::findOrFail($id);

    return view('frontend.portfolios.show', compact('portfolio'));
  }
}
