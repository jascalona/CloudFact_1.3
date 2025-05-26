<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class parks extends Model
{

    // En tu modelo (app/Models/TuModelo.php)
    protected $table = 'parks'; // Nombre real de tu tabla en DB

    /**Function for references table alquilers */
    public function alquilers()
    {
        return $this->belongsTo(alquilers::class, 'n_contract', 'n_contract');
    }

}