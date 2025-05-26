<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lgenal extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $tale = 'lgenals';
    protected $primaryKey = 'n_contract';
    public $incrementing = false;

}