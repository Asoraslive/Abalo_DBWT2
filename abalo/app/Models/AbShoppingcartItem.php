<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbShoppingcartItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "ab_shoppingcart_item";

    public function cart()
    {
        return $this->belongsTo(AbShoppingcart::class ,'ab_creator_id');
    }
    public function original(){
        return $this->belongsTo(ab_article::class,'ab_article_id','id');
    }
}
