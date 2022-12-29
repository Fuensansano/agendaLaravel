<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = auth()->user()->contacts;
        return view('contacts.index', compact('contacts'));
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

        auth()->user()->contacts()->create($data);
        return redirect()->route('home');
    }


    public function show(Contact $contact)
    {
        $this->authorize('view',$contact);

        return view('contacts.show', compact('contact'));
    }


    public function edit(Contact $contact)
    {
        $this->authorize('view',$contact);
        return view('contacts.edit', compact('contact'));
    }


    public function update(Request $request, Contact $contact)
    {
        $this->authorize('view',$contact);

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
        $this->authorize('view',$contact);

        $contact->delete();
        return redirect()->route('home');
    }
}
