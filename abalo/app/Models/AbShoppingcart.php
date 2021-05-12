<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbShoppingcart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "ab_shoppingcart";

    public function user()
    {
        return $this->belongsTo(ab_user::class ,'ab_creator_id');
    }
}
