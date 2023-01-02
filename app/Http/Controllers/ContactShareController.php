<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ContactShareController extends Controller
{
    public function create()
    {
        return view('contact-shares.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'contactEmail' => Rule::exists('contacts','email')
                ->where('user_id', auth()->id()),
            'userEmail' => "exists:users,email|not_in:{$request->user()->email}"
        ], [
            'userEmail.not_in' => "You can't share a contact with yourself",
            'contactEmail.exists' => "This contact was not found in your contacts list"
        ]);

        $user = User::where('email', $data['userEmail'])->first(['id','email']);
        $contact = Contact::where('email', $data['contactEmail'])->first(['id','email']);


        $shareExists = $contact->sharedWithUsers()->wherePivot('user_id',$user->id)->first();

        if ($shareExists) {
            return back()->withInput($request->all())->withErrors([
                'contactEmail' => "This contact was already shared with user $user->email"
            ]);
        }

        $contact->sharedWithUsers()->attach($user->id);

        return redirect()->route('home')->with('alert', [
            'message' => "Contact $contact->email shared with $user->email succesfully",
            'type' => 'success'
        ]);
    }
}
