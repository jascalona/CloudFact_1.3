<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Alquilers extends Model
{
    //
    protected $table = 'alquilers';

    protected $primaryKey = 'n_contract';

    public $incrementing = false;


    /**Function for references table lgenals */
    public function lgenals()
    {
        return $this->belongsTo(lgenals::class, 'n_contract', 'n_contract');
    }


    /**Function for references table ordens */
    public function ordens()
    {
        return $this->belongsTo(ordens::class, 'n_contract', 'n_contract');
    }

    
    /**Function for references table ordens */
    public function parks(){
        return $this->belongsTo(parks::class, 'n_contract', 'n_contract');
    }

}
