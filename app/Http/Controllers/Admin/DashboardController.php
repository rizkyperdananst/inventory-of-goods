<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // $date = Carbon::now()->format('H:i:s');
        // $date = date('H:i:s');
        // if($date == '22:00:00'){
        // }
        // dd($date);

        return view('admin.dashboard');
    }
}
