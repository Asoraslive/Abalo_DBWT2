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
        $item->forceFill(['ab_shoppingcart_id' => 1,'ab_article_id'=>$request->articleid])->save();

        return response()->json($item,201);
    }

    /**
     * Destroy-Action
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy($shoppingcartid, $articleId)
    {
        AbShoppingcartItem::query()->where('ab_shoppingcart_id', $shoppingcartid)->where('ab_article_id', $articleId)->delete();

        return response()->json([], 204);
    }
}
