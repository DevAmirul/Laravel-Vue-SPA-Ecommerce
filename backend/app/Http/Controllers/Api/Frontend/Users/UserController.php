<?php

namespace App\Http\Controllers\Api\Frontend\Users;

use App\Http\Controllers\Controller;
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
            ->find($request->id, ['id', 'name', 'email', 'gender']);
        return response(compact('user'), 200);
    }

    public function update(Request $request): Response
    {
        $user = User::find($request->id);
        $user->name = $request->data['name'];
        $user->email = $request->data['email'];
        // $request->data['password'] ? 'return validitaion' : null;
        $user->save();
        $user->billingDetail()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'phone' => $request->data['phone'],
                'address' => $request->data['address'],
                'address_2' => $request->data['address_2'],
                'city' => $request->data['city'],
                'state' => $request->data['state'],
                'zip_code' => $request->data['zip_code'],
            ]
        );
        return response(true, 200);
    }

    public function register(Request $request): Response
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
        $user->save();

        // $user->billingDetail()->create(
        //     [
        //         'phone' => $request->phone,
        //         'address' => $request->address,
        //         'address_2' => $request->address_2,
        //         'city' => $request->city,
        //         'state' => $request->state,
        //         'zip_code' => $request->zip_code,
        //     ]
        // );

        return response(true, 200);
    }

    public function login(Request $request): Response
    {
        return response(true, 200);
    }

    public function reset(Request $request): Response
    {
        return response(true, 200);
    }
}
