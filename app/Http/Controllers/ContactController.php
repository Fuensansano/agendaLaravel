<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

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
        Contact::create($request->all());
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
