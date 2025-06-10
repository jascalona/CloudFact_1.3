<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doc_content extends Model
{

    public function subTitles()
    {
        return $this->hasMany(doc_sub_titles::class, 'title_content', 'title_content');
    }

}
