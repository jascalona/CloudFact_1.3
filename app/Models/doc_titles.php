<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doc_titles extends Model
{
    protected $primaryKey = 'idCodigo'; // Especifica la PK si no es 'id'

    public function subTitles()
    {
        return $this->hasMany(doc_sub_titles::class, 'idContent', 'idCodigo');
    }
}
