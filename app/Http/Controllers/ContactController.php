<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index(){
        $contact = Contact::orderByDesc('id')->get();
        return view('admin.contact.index',compact('contact'));
    }
}
