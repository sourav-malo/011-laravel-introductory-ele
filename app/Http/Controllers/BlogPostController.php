<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Image;

class BlogPostController extends Controller {
  public function index() {
    $posts = BlogPost::latest()->get();

    return view('admin.blog-posts.index', compact('posts')); 
  }

  public function indexUser() {
    $posts = BlogPost::when(request('category_id'), function($query) {
        return $query->where('blog_category_id', request('category_id'));
      })
      ->paginate(4);

    return view('frontend.blogs.index', compact('posts')); 
  }
  
  public function create() {
    $categories = BlogCategory::all();

    return view('admin.blog-posts.create', compact('categories')); 
  }
  
  public function store(Request $request) {
    $request->validate([
      'title' => 'required|max:255|unique:blog_posts',
      'blog_category_id' => 'required|exists:blog_categories,id',
      'description' => 'nullable|max:2000',
      'image' => 'nullable|image|max:512',
      'tags' => 'nullable|max:255',
    ]);
    
    $imagePath = null;
    if($request->file('image')) {
      $imageFile = $request->file('image');
      $imageFilename = 'uploads/blog-post-images/'. Str::random(40) . '.' . $imageFile->getClientOriginalExtension();
      Image::make($imageFile)->resize(430,327)->save($imageFilename);
      $imagePath = $imageFilename; 
    }

    BlogPost::create([
      'title' => $request->title,
      'blog_category_id' => $request->blog_category_id,
      'description' => $request->description,
      'image' => $imagePath,
      'tags' => $request->tags,
    ]);

    $notification = [
      'alert-type' => 'success',
      'message' => "Blog post created successfully"    
    ];

    return redirect()->route('blog_posts.index')->with($notification);
  }
  
  public function edit($id) {
    $categories = BlogCategory::all();
    $post = BlogPost::findOrFail($id);

    return view('admin.blog-posts.edit', compact('post', 'categories'));
  }
  
  public function update($id, Request $request) {
    $request->validate([
      'title' => 'required|max:255|unique:blog_posts,title,'. $id,
      'blog_category_id' => 'required|exists:blog_categories,id',
      'description' => 'nullable|max:2000',
      'image' => 'nullable|image|max:512',
      'tags' => 'nullable|max:255'
    ]);

    $post = BlogPost::findOrFail($id);

    $post->title = $request->title;
    $post->blog_category_id = $request->blog_category_id;
    $post->description = $request->description;
    $post->tags = $request->tags;
    
    $oldImagePath = $post->image;
    if($request->file('image')) {
      $imageFile = $request->file('image');
      $imageFilename = 'uploads/blog-post-images/'. Str::random(40) . '.' . $imageFile->getClientOriginalExtension();
      Image::make($imageFile)->resize(430,327)->save($imageFilename);
      $oldImagePath = $post->image; 
      $post->image = $imageFilename; 
    }

    $post->save();
    $request->file('image') && !is_null($oldImagePath) && unlink($oldImagePath); 

    $notification = [
      'alert-type' => 'success',
      'message' => "Blog post updated successfully"    
    ];

    return redirect()->route('blog_posts.index')->with($notification);
  }

  public function destroy($id) {
    $post = BlogPost::findOrFail($id);

    $post->delete();
    !is_null($post->image) && unlink($post->image); 

    $notification = [
      'alert-type' => 'success',
      'message' => "Blog post deleted successfully"    
    ];

    return redirect()->back()->with($notification);
  }

  public function show($id) {
    $latestPosts = BlogPost::latest()->limit(5)->get();
    $categories = BlogCategory::all();
    $post = BlogPost::findOrFail($id);

    return view('frontend.blogs.show', compact('latestPosts', 'categories', 'post'));
  }
}
  
