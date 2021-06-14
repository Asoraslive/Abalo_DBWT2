<?php

namespace App\Http\Controllers;

use App\Models\ab_article;
use App\Models\AbShoppingcart;
use App\Models\AbShoppingcartItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingcartController extends Controller
{
    public function index()
    {
        return response()->json(['itemId' => AbShoppingcartItem::all()]);
    }

    public function show($id)
    {
        return response()->json(['shopItem' => ab_article::query()->where('id', $id)->get()], 202);
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

        $item = new AbShoppingcartItem();
        $item->forceFill(['ab_shoppingcart_id' => 1, 'ab_article_id' => $request->articleid])->save();
        return response()->json([], 201);


    }


    /**
     * Destroy-Action
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($articleId)
    {
        //AbShoppingcartItem::query()->where('ab_shoppingcart_id', $shoppingcartid)->where('ab_article_id', $articleId)->delete();
        AbShoppingcartItem::query()->where('ab_article_id', $articleId)->delete();

        return response()->json([], 204);
    }
}
