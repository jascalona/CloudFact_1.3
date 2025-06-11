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

        $materia = doc_titles::all();

        $contents = doc_content::with('subTitles')
            ->where('idCodigo', '1')
            ->get();

        return view('document.showDoc', compact('contents', 'materia'));
    }
    


    public function DocIdShow($idCodigo)
    {
        $contents = doc_content::with('subTitles')
            ->where('idCodigo', $idCodigo)
            ->get();

        return view('document.showDoc', compact('contents'));
    }


}
