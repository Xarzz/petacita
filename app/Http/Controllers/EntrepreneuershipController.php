<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntrepreneuershipController extends Controller
{
    public function index()
    {
        return view('entrepreneuership.index');
    }
}
