<?php

namespace App\Http\Controllers;

use App\Models\ab_article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Index function for general listing.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $articles = ab_article::query()->where('ab_name','ILIKE',"%".$search."%")->get();

        return response()->json($articles);
    }


    /**
     * Store-Action
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
       // dd($request);
        $id = DB::table('ab_users')->where('ab_name', "seller")->pluck('id')->first(); //$creatorId->id;
        $idInc = DB::table('ab_articles')->max('id') + 1;
        $article = new ab_article;
        $article->forceFill(['id'=> $idInc,'ab_name'=> $request->articleName,'ab_price'=>$request->articlePrice,'ab_description' => $request->articleDescription,'ab_creator_id'=>$id])->save();

        return response()->json($article->id,201);

    }

    /**
     * Destroy-Action
     *
     * @param Request $request
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        ab_article::destroy($id);

        return response()->json([], 204);
    }
}
