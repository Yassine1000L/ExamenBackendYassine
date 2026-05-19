<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //Kan niet rechtstreeks in class code zetten, je moet het binnen een functie zetten.    
    
    public function index() {

        return view('welcome');
    
    }
}
