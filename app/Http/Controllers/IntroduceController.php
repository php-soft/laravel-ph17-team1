<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class IntroduceController extends Controller
{
    public function index(){
        return view('introduces.introduce');
    }
}
