<?php

namespace App\Http\Controllers;

use App\Models\ab_article;
use App\Models\ab_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleTableController extends Controller
{
    public function index(){
        return view('Random_assignments/articletable_search',['articles'=> ab_article::all()]);
    }

    public function show(Request $request){
        $search = $request->input('search');

        $articles = ab_article::query()->where('ab_name','ILIKE',"%".$search."%")->get();

        return view('Random_assignments/articletable_search',['articles'=>$articles]);
    }

    public function store(Request $request){
        $article = new ab_article;
        $article->id = (int)DB::table('ab_articles')->max('id') + 1;
        $article->ab_name = $request->articleName;
        $article->ab_price = $request->articlePrice;
        $article->ab_description = $request->articleDescription;
        $article->ab_creator_id = DB::table('ab_users')->where('ab_name', 'ilike', $request->articleSeller)->first('id') ?? 1; //$creatorId->id;
        $article->save();
        //return redirect()->to('/articles');
    }
}
