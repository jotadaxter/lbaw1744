<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function showHome()
    {
        return view('home');
    }



    public function showAbout()
    {
        return view('about');
    }

    public function showContacts()
    {
        return view('contacts');
    }

    public function showTerms()
    {
        return view('terms');
    }

    public function showPrivacy()
    {
        return view('privacy');
    }

    public function show404()
    {
        return view('404');
    }
}
