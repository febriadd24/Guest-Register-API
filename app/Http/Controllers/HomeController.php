<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function Alltoday()
    {
        $mytime = now();

$counts = DB::table('interactions')
            ->whereDate('waktu_masuk','=',Carbon::today()->toDateString())
           ->count();

            $countsIn = DB::table('interactions')
            ->whereDate('waktu_masuk','=',Carbon::today()->toDateString())
            ->where('waktu_keluar','=',null)
            ->count();

            $countsOut = DB::table('interactions')
            ->whereDate('waktu_keluar','=',Carbon::today()->toDateString())
            ->count();

             $countsMiss = DB::table('interactions')
             ->where('waktu_keluar','=',null)
            ->count();

            return view('home',compact('counts','countsIn','countsOut','countsMiss'));
    }
}
