<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
class MesssagesController extends Controller
{
    public function submit(Request $request){
      //return $request->input('name');
      $this->Validate($request,[
        'name' =>'required',
        'email' => 'required'
      ]);
      //create new mesasge

      $message = new Message;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->message = $request->input('message');

      //save message
      $message->save();

      //redirect to home page with a message
      return redirect('/')->with('success', 'Mesasge Sent');
    }

    public function getMessages(){
      $messages = Message::all();
      return view('messages')->with('messages',$messages);
    }
}
