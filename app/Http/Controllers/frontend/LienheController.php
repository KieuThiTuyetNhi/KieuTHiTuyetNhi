<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use DB;
use App\Cart;
use Session;

class  LienheController extends Controller
{
public function index(){
    return view('frontend.contact.index'); 
}
public function xuly( Request $request){
    $contact = new Contact;
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->content = $request->content;
    $contact->title = $request->title;       
    $contact->phone = $request->phone;
    $contact->created_by = 1; 
    $contact->status = 1; 
    $contact->save();    
    return redirect()->route('site.home'); 
}

}
