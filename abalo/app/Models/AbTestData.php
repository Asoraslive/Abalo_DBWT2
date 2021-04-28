<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbTestData extends Model
{
    use HasFactory;

    protected $table = 'ab_test_data';
    protected $fillable = 'ab_testname';

    //returns all ab_testdata entries
    public static function index(){
        return DB::table('ab_test_data')->get();
    }


}
