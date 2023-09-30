<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SearchedKeyword;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller {

    /**
     * Search products by name/sku/tags.
     */
    public function index(Request $request): JsonResponse {
        $this->saveSearchedKeyword($request);

        $products = DB::table('products')
            ->select('products.id as p_id', 'products.name', 'products.sale_price', 'products.slug', 'products.sku', 'products.image', 'products.created_at', 'offers.discount', 'offers.type', 'offers.status', 'offers.expire_date')
            ->leftJoin('offers', 'products.offer_id', '=', 'offers.id')
            ->where('products.name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('products.sku', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('products.tags', 'LIKE', '%' . $request->keyword . '%')
            ->paginate($request->limit ?? 20);

        return response()->json(compact('products'));
    }

    /**
     * Store the keywords searched by the user.
     */
    public function saveSearchedKeyword(object $request): void {
        SearchedKeyword::updateOrCreate(['keyword' => $request->keyword], ['hits' => DB::raw('hits+' . 1)]);
    }
}
