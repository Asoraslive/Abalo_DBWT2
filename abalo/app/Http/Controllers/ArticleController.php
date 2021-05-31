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
        //       $columns = ['ab_name', 'ab_price', 'ab_description', 'ab_creator_id'];
        $length = $request->input('length');
//        $column = $request->input('column');
//        $dir = $request->input('dir');
        $searchValue = $request->input('search');

        //$query = ab_article::query()->select('id', 'ab_name', 'ab_price', 'ab_description', 'ab_creator_id')->orderBy($columns[$column], $dir);
        $query = ab_article::query()->select('id', 'ab_name', 'ab_price', 'ab_description', 'ab_creator_id');

        //search
        if ($searchValue) {
            $query->where(function ($query) use ($searchValue) {
                $query->where('ab_name', 'ILike', '%' . $searchValue . '%')
                    ->orWhere('ab_price', 'Like', '%' . $searchValue . '%');
            });
        }

        //$articles = $query->paginate($length);
        $articles = $query->get();

        //ausgabe zum ajax call
        return response()->json(['data' => $articles, 'draw' => $request->input('draw')], 202);
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
        $article->forceFill(['id' => $idInc, 'ab_name' => $request->articleName, 'ab_price' => $request->articlePrice, 'ab_description' => $request->articleDescription, 'ab_creator_id' => $id])->save();

        return response()->json($article->id, 201);

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

    //custom Funciton
    public function lastArticle()
    {
        //get last article
        $last = ab_article::orderBy('ab_createdate', 'desc')->limit(6)->get();
        //respond list
        return response()->json(['articles' => $last], 202);
    }
}
