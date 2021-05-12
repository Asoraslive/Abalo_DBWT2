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
        $articles = ab_article::query()->where('ab_name','ILIKE',"%".$search."%")->pluck('ab_name');

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
        $article = new ab_article;
        $article->id = (int)DB::table('ab_articles')->max('id') + 1;
        $article->ab_name = $request->articleName;
        $article->ab_price = $request->articlePrice;
        $article->ab_description = $request->articleDescription;
        $article->ab_creator_id = 8;

        if($request->articlePrice > 0 && !empty($request->articleName)) {
            $article->save();

            return response()->json($article->id);
        }
        return response()->json("error");
    }

    /**
     * Destroy-Action
     *
     * @param Request $request
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        ab_article::destroy($id);

        return response()->json([], 204);
    }
}
