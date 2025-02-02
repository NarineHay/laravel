<?php

namespace App\Http\Controllers\WorkShop\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke(){
        dd(11);
        $users = User::all()->pagination(2);
        return response()->json(['result' => $users]);
    }
}
