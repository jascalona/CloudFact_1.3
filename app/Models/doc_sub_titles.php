<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doc_sub_titles extends Model
{
    
   public function content()
    {
        // Relación con doc_contents mediante title_content
        return $this->belongsTo(doc_content::class, 'title_content', 'title_content');
    }

}
