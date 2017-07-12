<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class WarrantyController extends Controller
{
    public function index()
    {
        return view('warrantys.warranty');
    }
}
