<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function Alltoday()
    {
        $mytime = now();

$counts = DB::table('interactions')
            ->where('waktu_masuk','>',$mytime)
            ->count();

            return view('home',compact('counts'));
    }

    public function TodayIn()
    {
        return view('home');
    }

    public function TodayOut()
    {
        return view('home');

    }

    public function Missing()
    {
        return view('home');
    }
}
