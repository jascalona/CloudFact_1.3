<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lgenals extends Model
{

    public function alquilers()
    {
        return $this->hasOne(Alquilers::class, 'n_contract', 'n_contract');

    }

    protected $fillable = [
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
    ];

}
