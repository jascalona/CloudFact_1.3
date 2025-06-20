<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class parks extends Model
{

    // En tu modelo (app/Models/TuModelo.php)
    protected $table = 'parks'; // Nombre real de tu tabla en DB

    /**Function for references table alquilers */


    protected $fillable = [
        'doc_path', // Añade este campo
    ];

    public function alquilers()
    {
        return $this->belongsTo(alquilers::class, 'n_contract', 'n_contract');
    }

}