<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('contact');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|digits:9',
            'age' => 'required|numeric|min:1|max:105',
            'email' => 'required|email',
        ]);
        return response("contact stored");
    }


    public function show(Contact $contact)
    {
        //
    }


    public function edit(Contact $contact)
    {
        //
    }


    public function update(Request $request, Contact $contact)
    {
        //
    }


    public function destroy(Contact $contact)
    {
        //
    }
}
