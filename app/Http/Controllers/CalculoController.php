<?php

namespace App\Http\Controllers;

use App\Models\lgenals;
use Illuminate\Http\Request;

class CalculoController extends Controller
{
    public function calculo()
    {
        if (!empty($_GET['calculo'])) {

            if (!empty($_GET['date'])) {

                $datevar = $_GET['date'];

                $datecon = lgenals::where('date', $datevar);

                return view("orden", compact('datecon'));

            } else {
                echo '<script>alert("Debe seleccionar al menos un mes")</script>';
            }


        } else {
            echo '<script>alert("ERror")</script>';
        }

    }

}
