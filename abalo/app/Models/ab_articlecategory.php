<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ab_articlecategory extends Model
{
    use HasFactory;



    public function articles()
    {
        return $this->belongsToMany(ab_article::class);
    }
}
