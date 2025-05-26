<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordens extends Model
{
    
    /**Function for references table alquilers */
    public function alquilers(){
        return $this->belongsTo(alquilers::class, 'n_contract', 'n_contract');
    }
}
