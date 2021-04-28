<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ab_article extends Model
{
    use HasFactory;
    protected $fillable = ['ab_name','ab_price','ab_description','ab_creator_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(ab_user::class ,'ab_creator_id');
    }

    public  function  categories(){
        return $this->belongsToMany(ab_articlecategory::class);
    }
}
