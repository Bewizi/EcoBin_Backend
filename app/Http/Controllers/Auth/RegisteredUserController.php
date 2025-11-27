<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        $request->validated();

        $user = User::create([
            'id' => $request->id,
            'fullName' => $request->fullName,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'password' => Hash::make($request->string('password')),
        ]);

        // $user->profile()->create([
        //     'userType',
        //     'pickupLocation',
        //     'avater'
        // ]);

        $token = $user->createToken('main')->plainTextToken;


        event(new Registered($user));

        $user->load('profile');

        return response()->json([
            'user' => $user,
            'token' => $token

        ], 201);
    }
}
