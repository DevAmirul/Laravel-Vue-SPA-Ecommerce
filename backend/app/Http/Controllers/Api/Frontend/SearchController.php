<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SearchedKeyword;
use App\Services\SearchProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $this->saveSearchedKeyword($request);

        $products = DB::table('products')
            ->select('products.id as p_id', 'products.name', 'products.sale_price', 'products.slug', 'products.sku', 'products.image', 'products.created_at', 'offers.discount', 'offers.type', 'offers.status', 'offers.expire_date')
            ->join('offers', 'products.offer_id', '=', 'offers.id')
            ->where('products.name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('products.sku', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('products.tags', 'LIKE', '%' . $request->keyword . '%')
            ->paginate($request->limit ?? 20);

        return response(compact('products'), 200);
    }

    public function saveSearchedKeyword($request): void
    {
        SearchedKeyword::updateOrCreate(['keyword' => $request->keyword], ['hits' => DB::raw('hits+' . 1)]);
    }
}
