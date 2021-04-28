<?php

namespace App\Http\Controllers;

use App\Models\ab_articlecategory;
use Illuminate\Http\Request;

class AbArticlecategoryController extends Controller
{
    public function index(){
        return view('Random_assignments/articlecategories',['categories'=> ab_articlecategory::all()]);
    }

    public function show(Request $request){
        $search = $request->input('search');

        $articles = ab_articlecategory::query()->where('ab_name','ILIKE',"%".$search."%")->get();

        return view('Random_assignments/articlecategories',['categories'=>$articles]);
    }
}
