<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Input;

class StoreController extends Controller
{
    public function index()
    {
        return view('admin.stores.index');
    }
}
