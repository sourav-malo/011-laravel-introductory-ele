<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller {
  public function index() {
    $messages = ContactMessage::all();

    return view('admin.contact-me.index', compact('messages'));
  }

  public function store(Request $request) {
    $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|email|max:255',
      'subject' => 'required|max:255',
      'budget' => 'required|max:255',
      'message' => 'required|max:2000',
    ]);

    ContactMessage::create([
      'name' => $request->name,
      'email' => $request->email,
      'subject' => $request->subject,
      'budget' => $request->budget,
      'message' => $request->message,
    ]);

    $notification = [
      'alert-type' => 'success',
      'message' => "Your message sent successfully"    
    ];

    return redirect()->back()->with($notification);
  }

  public function show() {
    return view('frontend.contact-me.show');
  }

  public function destroy($id) {
    ContactMessage::findOrFail($id)->delete();

    $notification = [
      'alert-type' => 'success',
      'message' => "Message removed successfully"    
    ];

    return redirect()->back()->with($notification);
  }
}
