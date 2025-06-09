<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
  
    public function DocIndex(){
        return view('document.showDoc');
    }


}
