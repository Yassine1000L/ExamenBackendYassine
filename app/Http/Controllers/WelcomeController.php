<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    // Kan niet rechtstreeks in class code zetten, je moet het binnen een functie zetten.

    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        return redirect('/');
    }
}
