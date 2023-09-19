<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\BillingDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request): Response
    {
        $user = User::with('billingDetail:user_id,phone,address,address_2,city,state,zip_code')
            ->withCount('order')
            ->withCount('review')
            ->find($request->id, ['id', 'name', 'email']);
        return response(compact('user'), 200);
    }

    public function update(UserRequest $request): Response
    {
        $user = User::find($request->id);
        $user->name = $request->validated('name');
        $user->email = $request->validated('email');
        if ($request->validated('password')) $user->password = $request->validated('password');
        $user->save();

        BillingDetails::updateOrCreate( ['user_id'=> $request->id], [
                'phone' => $request->validated('phone'),
                'address' => $request->validated('address'),
                'address_2' => $request->validated('address_2'),
                'city' => $request->validated('city'),
                'state' => $request->validated('state'),
                'zip_code' => $request->validated('zip_code'),
            ]
        );
        return response(['message'=> 'Successfully updated profile'], 200);
    }

    // public function register(Request $request): Response
    // {
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->gender = $request->gender;
    //     $user->password = Hash::make($request->password);
    //     $user->save();

    //     // $user->billingDetail()->create(
    //     //     [
    //     //         'phone' => $request->phone,
    //     //         'address' => $request->address,
    //     //         'address_2' => $request->address_2,
    //     //         'city' => $request->city,
    //     //         'state' => $request->state,
    //     //         'zip_code' => $request->zip_code,
    //     //     ]
    //     // );

    //     return response(true, 200);
    // }

}
