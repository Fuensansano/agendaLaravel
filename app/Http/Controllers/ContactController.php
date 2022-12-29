<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{

    public function index()
    {
        return view('contacts.index', ['contacts' => Contact::all()]);
    }


    public function create()
    {
        return view('contacts.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone_number' => 'required|digits:9',
            'age' => 'required|numeric|min:1|max:105',
            'email' => 'required|email',
        ]);

        Contact::create($data);
        return redirect()->route('home');
    }


    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }


    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }


    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone_number' => 'required|digits:9',
            'age' => 'required|numeric|min:1|max:105',
            'email' => 'required|email',
        ]);

        $contact->update($data);
        return redirect()->route('home');
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('home');
    }
}
