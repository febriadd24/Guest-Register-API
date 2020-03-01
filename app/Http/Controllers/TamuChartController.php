<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\TamuChart;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class TamuChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = collect();

        $period = CarbonPeriod::create('2019-05-27','1 days','2019-05-30');
        foreach ($period as $key => $date) {
           $dates->put ($date->format('Y-m-d'),0);
        }
           $counttamu = DB::table('interactions')
        ->whereDate('waktu_masuk','=',$dates->keys()->first())
        ->groupBy( 'id' )
        ->orderBy( 'id' )
        ->get(
            [
                DB::raw( 'DATE( waktu_masuk ) as date' ),
                DB::raw( 'COUNT( * ) as "count"' )
            ]
            )
        ->pluck( 'count', 'date' );
        $dates = $dates->merge( $counttamu );

        foreach ( $dates as $date => $count )
        {
            $counts[]=$count;
        }
        // return $counttamu;
    // return view('TamuChart', compact( 'dates' ));
    $tamuChart= new TamuChart;
    $tamuChart->labels($dates);
    $tamuChart->dataset('Users by trimester', 'line', $counts )
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(255, 99, 132)");
            return view('TamuChart', [ 'tamuChart' => $tamuChart ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
