<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller {
    public string $priceAcce     = '';
    public string $searchStr     = '';
    public string $latest        = '';
    public string $filterByPrice = '';
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {

        $products = DB::table('products')
            ->join('discount_prices', 'products.id', '=', 'discount_prices.product_id')
            ->select('products.id as p_id', 'products.name', 'products.sale_price', 'products.sku', 'products.image', 'discount_prices.discount')
            ->when($this->searchStr, function ($query) {
                $query->where('name', 'LIKE', '%' . $this->searchStr . '%');
            })
            ->when($this->priceAcce, function ($query) {
                $query->orderByDesc('products.sale_price');
            })
            ->when($this->latest, function ($query) {
                $query->latest();
            })->paginate(20);

        return response(compact('products'), 200);
    }
}
