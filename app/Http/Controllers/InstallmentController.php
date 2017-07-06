<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class InstallmentController extends Controller
{
    public function index(){
        return view('installments.installment');
    }
}
