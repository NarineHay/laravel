<?php

namespace App\Http\Controllers\WorkShop\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(){
        return response()->json('dasgboard');

    }
}
