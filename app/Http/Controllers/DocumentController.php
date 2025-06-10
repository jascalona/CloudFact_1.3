<?php

namespace App\Http\Controllers;

use App\Models\doc_sub_titles;
use Illuminate\Http\Request;
use App\Models\doc_content;
use App\Models\doc_titles;


class DocumentController extends Controller
{

    public function DocIndex()
    {

        $contents = doc_content::with('subTitles')->get();
        return view('document.showDoc', compact('contents'));
    }


}
