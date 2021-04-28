<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ab_user extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->hasMany(ab_article::class,'ab_creator_id');
    }
}
