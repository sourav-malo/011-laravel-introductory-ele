<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Image;

class BlogCategoryController extends Controller {
  public function index() {
    $categories = BlogCategory::latest()->get();

    return view('admin.blog-categories.index', compact('categories')); 
  }

  public function create() {
    return view('admin.blog-categories.create'); 
  }

  public function store(Request $request) {
    $request->validate([
      'name' => 'required|max:255|unique:blog_categories'
    ]);

    BlogCategory::create([
      'name' => $request->name 
    ]);

    $notification = [
      'alert-type' => 'success',
      'message' => "Blog category created successfully"    
    ];

    return redirect()->route('blog_categories.index')->with($notification);
  }

  public function edit($id) {
    $category = BlogCategory::findOrFail($id);

    return view('admin.blog-categories.edit', compact('category'));
  }
  
  public function update($id, Request $request) {
    $request->validate([
      'name' => 'required|max:255|unique:blog_categories,name,'. $id
    ]);

    BlogCategory::findOrFail($id)->update([
      'name' => $request->name
    ]);

    $notification = [
      'alert-type' => 'success',
      'message' => "Blog category updated successfully"    
    ];

    return redirect()->route('blog_categories.index')->with($notification);
  }

  public function destroy($id) {
    $portfolio = BlogCategory::findOrFail($id)->delete();

    $notification = [
      'alert-type' => 'success',
      'message' => "Blog category deleted successfully"    
    ];

    return redirect()->back()->with($notification);
  }
}
