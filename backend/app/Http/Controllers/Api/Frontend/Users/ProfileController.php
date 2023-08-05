<?php

namespace App\Http\Controllers\Api\Frontend\Users;

use App\Http\Controllers\Controller;
use App\Models\BillingDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller {

    public function index(Request $request): Response{
        $user = User::whereId($request->id)
            ->with('billingDetail:user_id,phone,address,address_2,city,state,zip_code')
            ->get(['id', 'name', 'email', 'gender']);
        return response(compact('user'), 200);
    }

    public function update(Request $request): Response{
        User::whereId($request->id)->update();
        BillingDetails::where('user_id', $request->id)->update();
        return response(true, 200);
    }

    public function create(Request $request): Response{
        $user = User::create();
        BillingDetails::create();
        return response(true, 200);
    }
}
