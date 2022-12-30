<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        return view('home', [
            'contacts' => auth()->user()->contacts()->latest()->take(9)->get()
        ]);
    }
}
