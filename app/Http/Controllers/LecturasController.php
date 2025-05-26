<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturasController extends Controller
{
    public function index(){
        return view('layouts.ImpCustomer');
    }
}
