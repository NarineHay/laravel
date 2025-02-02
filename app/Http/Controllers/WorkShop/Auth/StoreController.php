<?php

namespace App\Http\Controllers\WorkShop\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function store(StoreRequest $request){
        // dd($request->all());
        $data = $request->all();
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token =  auth()->tokenById($user->id);

        try {
            $user->sendEmailVerificationNotification();

            return response()->json(['message' => 'Verification email sent.']);
        } catch (\Exception $e) {
            dd( $e->getMessage());
        }

    // return response()->json(['message' => 'Registration successful. Please verify your email.']);

        // return response()->json(['access_token' => $token]);
    }
}
