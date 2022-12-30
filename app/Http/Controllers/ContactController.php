<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
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


    public function store(StoreContactRequest $request)
    {
        $contact = auth()->user()->contacts()->create($request->validated());

        return redirect()->route('home')->with('alert', [
            'message' => "Contact $contact->name successfully saved",
            'type' => 'success'
        ]);
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


    public function update(StoreContactRequest $request, Contact $contact)
    {
        $this->authorize('update',$contact);

        $contact->update($request->validated());
        return redirect()->route('home')->with('alert', [
            'message' => "Contact $contact->name successfully updated",
            'type' => 'success'
        ]);
    }


    public function destroy(Contact $contact)
    {
        $this->authorize('view',$contact);

        $contact->delete();
        return back()->with('alert', [
        'message' => "Contact $contact->name successfully updated",
        'type' => 'success'
    ]);
    }
}
