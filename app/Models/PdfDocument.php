<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdfDocument extends Model
{
    /**DEFICINCION DE COLUMAS */
    protected $fillable = ['name', 'path', 'size'];
}