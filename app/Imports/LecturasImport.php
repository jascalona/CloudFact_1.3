<?php

namespace App\Imports;

use App\Models\lgenals;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use function Laravel\Prompts\form;
use Carbon\Carbon;


class LecturasImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        //MOSTRAR EN FORMATO JSON dd($rows);


        //DATE
        $date = Carbon::now();

        $mes_anio_actual = $date->translatedFormat('F Y');

        foreach ($rows as $row)

            lgenals::create([
                "n_contract" => $row["n_contract"],
                "cliente" => $row["cliente"],
                "rif" => $row["rif"],
                "serial" => $row["serial"],
                "model" => $row["model"],
                "location" => $row["location"],

                //DATE
                "date" => $date->format('Y-m-d'),
                "mes" => $mes_anio_actual,

                //CONTADORES B/N
                "cont_ante_bn" => $row["cont_ante_bn"],
                "cont_actu_bn" => $row["cont_actu_bn"],
                "volum_bn" => $row["volum_bn"],
                "amcv_bn" => $row["amcv_bn"],

                //CONTADORES COLOR
                "cont_ante_color" => $row["cont_ante_color"],
                "cont_actu_color" => $row["cont_actu_color"],
                "volum_color" => $row["volum_color"],
                "amcv_color" => $row["amcv_color"],

                //SCAN IMAGES
                "cont_ante_scan_images" => $row["cont_ante_scan_images"],
                "cont_actu_scan_images" => $row["cont_actu_scan_images"],
                "volum_scan_images" => $row["volum_scan_images"],

                //SCAN JOBS
                "cont_ante_scan_jobs" => $row["cont_ante_scan_jobs"],
                "cont_actu_scan_jobs" => $row["cont_actu_scan_jobs"],
                "volum_scan_jobs" => $row["volum_scan_jobs"],

            ]);

    }
}
