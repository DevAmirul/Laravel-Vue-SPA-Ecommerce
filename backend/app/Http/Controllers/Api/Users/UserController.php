<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\BillingDetails;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller {

    /**
     * Get authenticated user.
     */
    public function index(Request $request): JsonResponse {
        $user = User::with('billingDetail:user_id,phone,address,address_2,city,state,zip_code')
            ->withCount('order')
            ->withCount('review')
            ->find($request->id, ['id', 'name', 'email']);

        return response()->json(compact('user'));
    }

    /**
     * Update authenticated user.
     */
    public function update(UserRequest $request): JsonResponse {
        $user        = User::find($request->id);
        $user->name  = $request->validated('name');
        $user->email = $request->validated('email');
        if ($request->validated('password')) {
            $user->password = $request->validated('password');
        }
        $user->save();

        BillingDetails::updateOrCreate(['user_id' => $request->id], [
            'phone'     => $request->validated('phone'),
            'address'   => $request->validated('address'),
            'address_2' => $request->validated('address_2'),
            'city'      => $request->validated('city'),
            'state'     => $request->validated('state'),
            'zip_code'  => $request->validated('zip_code'),
        ]
        );
        return response()->json(['message' => 'Successfully updated profile']);
    }
}
