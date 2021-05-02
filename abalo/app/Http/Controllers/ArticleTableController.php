<?php

namespace App\Http\Controllers;

use App\Models\ab_article;
use App\Models\ab_user;
use Illuminate\Http\Request;

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
        $creatorId = ab_user::query()->where('ab_name',$request->articleSeller)->firstOrFail();
        $article = new ab_article;
        $article->ab_name = $request->articleName;
        $article->ab_price = $request->articlePrice;
        $article->ab_description = $request->articleDescription;
        $article->ab_creator_id = $creatorId->id;
        $article->save();
        return redirect()->to('/articles');
    }
}
