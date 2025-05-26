<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\lgenals;

class ExportController extends Controller
{
    public function exportToCSV(Request $request)
    {
        // Validar las fechas
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde',
            'primary' => 'required|string'
        ]);

        // Obtener datos basados en el rango de fechas 
        $datos = lgenals::whereBetween('date', [
                $request->fecha_desde,
                $request->fecha_hasta
            ])
            /**FILTRO PRIMARIO N_CONTRACT */
            ->where('n_contract', $request->primary) 
            ->get();

        // Si no hay datos, redirigir con mensaje
        if ($datos->isEmpty()) {
            return back()->with('warning', 'No hay datos para exportar en el rango seleccionado');
        }

        // Configurar cabeceras CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="BULK_LOAD_FILES_FOR_READING' . date('YmdHis') . '.csv"',
        ];

        // Función callback para generar el CSV
        $callback = function() use ($datos) {
            $file = fopen('php://output', 'w');
            
            // Escribir encabezados (ajusta según tus columnas)
            fputcsv($file, [
                'n_contract', 
                'cliente', 
                'rif', 
                'serial',
                'model',
                'location',
                'date',
                'mes',
                'cont_ante_bn',
                'cont_actu_bn',
                'volum_bn',
                'amcv_bn',
                'cont_ante_color',
                'cont_actu_color',
                'volum_color',
                'amcv_color',
                'cont_ante_scan_images',
                'cont_actu_scan_images',
                'volum_scan_images',
                'cont_ante_scan_jobs',
                'cont_actu_scan_jobs',
                'volum_scan_jobs'
                // Agrega más columnas según necesites
            ], ';'); // Usamos ; como delimitador
            
            
            

            // Escribir datos
            foreach ($datos as $dato) {

            $const = 0;

                fputcsv($file, [
                    $dato->n_contract,
                    $dato->cliente,
                    $dato->rif,
                    $dato->serial,
                    $dato->model,
                    $dato->location,
                    $dato->date,
                    $dato->mes,
                    $dato->cont_actu_bn,
                    $dato->$const,
                    $dato->$const,
                    $dato->amcv_bn,
                    $dato->cont_actu_color,
                    $dato->$const,
                    $dato->$const,
                    $dato->amcv_color,
                    $dato->cont_actu_scan_images,
                    $dato->$const,
                    $dato->$const,
                    $dato->cont_actu_scan_jobs,
                    $dato->$const,
                    $dato->$const
                    // Agrega más campos según corresponda
                ], ';');
            }
            
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }




    /**FUNCION PARA LA EXPORTACION DE DATA DE LECTURAS GENERALES */

    public function exportGeneralCSV(Request $request){
        {
        // Validar las fechas
        $request->validate([
            'fecha_desde' => 'required|date',
            'fecha_hasta' => 'required|date|after_or_equal:fecha_desde'
        ]);

        // Obtener datos basados en el rango de fechas 
        $datos = lgenals::whereBetween('date', [
                $request->fecha_desde,
                $request->fecha_hasta
            ])
            ->get();

        // Si no hay datos, redirigir con mensaje
        if ($datos->isEmpty()) {
            return back()->with('warning', 'No hay datos para exportar en el rango seleccionado');
        }

        // Configurar cabeceras CSV
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="BULK_LOAD_FILES_FOR_READING' . date('YmdHis') . '.csv"',
        ];

        // Función callback para generar el CSV
        $callback = function() use ($datos) {
            $file = fopen('php://output', 'w');
            
            // Escribir encabezados (ajusta según tus columnas)
            fputcsv($file, [
                'n_contract', 
                'cliente', 
                'rif', 
                'serial',
                'model',
                'location',
                'date',
                'mes',
                'cont_ante_bn',
                'cont_actu_bn',
                'volum_bn',
                'amcv_bn',
                'cont_ante_color',
                'cont_actu_color',
                'volum_color',
                'amcv_color',
                'cont_ante_scan_images',
                'cont_actu_scan_images',
                'volum_scan_images',
                'cont_ante_scan_jobs',
                'cont_actu_scan_jobs',
                'volum_scan_jobs'
                // Agrega más columnas según necesites
            ], ';'); // Usamos ; como delimitador
            
            
            

            // Escribir datos
            foreach ($datos as $dato) {

            $const = 0;

                fputcsv($file, [
                    $dato->n_contract,
                    $dato->cliente,
                    $dato->rif,
                    $dato->serial,
                    $dato->model,
                    $dato->location,
                    $dato->date,
                    $dato->mes,
                    $dato->cont_actu_bn,
                    $dato->$const,
                    $dato->$const,
                    $dato->amcv_bn,
                    $dato->cont_actu_color,
                    $dato->$const,
                    $dato->$const,
                    $dato->amcv_color,
                    $dato->cont_actu_scan_images,
                    $dato->$const,
                    $dato->$const,
                    $dato->cont_actu_scan_jobs,
                    $dato->$const,
                    $dato->$const
                    // Agrega más campos según corresponda
                ], ';');
            }
            
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
    }
    
    



}