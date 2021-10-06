<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\TamuChart;
use Carbon\Carbon;
use App\interactions;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Label;

class TamuChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function index()
//     {

// $awal=Carbon::create('2019-05-1');
//         $dates = collect();
//         foreach( range( 1,0 ) AS $i ) {
//             $date = $awal->addDays( $i )->format( 'Y-m-d' );
//             $dates->put( $date, 0);
//         }
//            $counttamu = DB::table('interactions')
//         ->whereDate('waktu_masuk','<=',$dates->keys()->first())
//         ->groupBy( 'date' )
//         ->orderBy( 'date' )
//         ->get(
//             [
//                 DB::raw( 'DATE( waktu_masuk ) as date' ),
//                 DB::raw( 'COUNT( * ) as "count"' )
//             ]
//             )
//         ->pluck( 'count', 'date' );
//         $dates = $dates->merge( $counttamu );

//         foreach ( $dates as $date => $count )
//         {
//             $alldata = $dates->implode(',');
//         }
//         return $dates;
    // return view('TamuChart', compact( 'dates' ));
    // $tamuChart= new TamuChart;
    // $tamuChart->labels($dates);
    // $tamuChart->dataset('Users by trimester', 'line', $counts )
    //         ->color("rgb(255, 99, 132)")
    //         ->backgroundcolor("rgb(255, 99, 132)");
    //         return view('TamuChart', [ 'tamuChart' => $tamuChart ] );
    // }

    public function index(Request $request)
    {
        $awal=$request->get('start_date');
        $akhir=$request->get('end_date');
        if (is_null($awal) or is_null($akhir))
{
        $record = interactions::select(DB::raw("COUNT(*) as count"),
        DB::raw("DAY(waktu_masuk) as day"))
        // ->whereDate('waktu_masuk', '>=', $awal)
        ->groupBy('day')
        ->orderBy('day')
        ->get();
}
else{
    $record = interactions::select(DB::raw("COUNT(*) as count"),
    DB::raw("DAY(waktu_masuk) as day"))
    ->whereDate('waktu_masuk', '>=', $awal)
    ->whereDate('waktu_masuk', '<=', $akhir)
    ->groupBy('day')
    ->orderBy('day')
    ->get();
}
         $data = [];
         foreach($record as $row) {
            $data['label'][] = $row->day;
            $data['data'][] = (int) $row->count;
          }

        $data['chart_data'] = json_encode($data);
        $label = $data['label'];
        $data = $data['data'];


    $tamuChart= new TamuChart;
    $tamuChart->labels($label);
    $tamuChart->dataset('Semua Pengunjung', 'bar', $data )
            ->color("rgb(255, 99, 132)")
            ->backgroundcolor("rgb(170, 99, 132)");
            return view('TamuChart', [ 'tamuChart' => $tamuChart ] );
        // return $data;
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
