<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class RegulationController extends Controller
{
    public function index()
    {
        return view('regulations.regulation');
    }
}
