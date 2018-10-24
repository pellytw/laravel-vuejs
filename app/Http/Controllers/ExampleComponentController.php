<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleComponentController extends Controller
{
    public function index()
    {
        return view('spa');
    }
}
