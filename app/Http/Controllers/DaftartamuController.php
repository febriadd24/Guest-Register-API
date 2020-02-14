<?php

namespace App\Http\Controllers;

use App\Exports\InteractionsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use App\interactions;
use App\pengunjung;
use App\tujuan;
use Carbon\Carbon;
use Carbon\Traits\Week;
use Maatwebsite\Excel;
use Maatwebsite\Excel\Facades\Excel as MaatwebsiteExcel;

class DaftartamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Dept = tujuan::pluck('Department');
        return view('daftartamu',compact('Dept'));
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
    public function show($NIK)
    {
        //
        $model = pengunjung::where('NIK', '=', $NIK)->firstOrFail();
        return view('DetailPengunjung',compact('model'));
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
        $model= interactions::findOrFail($id);
        $model->delete();
    }

//     public function dataTable(Request $request)
//     {
//         $model = interactions::with('DataPengunjung')->get();
//         // ->whereBetween('waktu_masuk',[$datefrom,$dateto]);
//         return DataTables::of($model)
//         ->addColumn('Foto', function ($model) {
//             return '<img src=" '.$model->Foto.' "/>';})
//             ->addColumn('action', function ($model) {
//                 return view('_action', [
//                     'model' => $model,
//                     'url_show' => route('daftartamu.show', $model->NIK),
//                     'url_edit' => route('daftartamu.edit', $model->id),
//                     'url_destroy' => route('daftartamu.destroy', $model->id)
//                 ]);
//             })
//             ->addIndexColumn()
//             ->rawColumns(['action'])
//             ->make(true);
// }


public function GetBagian(Request $request){
    $userID = tujuan::all('Bagian')
    ->where('Department','=',$request->get('Department'));
    return view('layouts.pages.report.adminindex',compact('userID'));
}
    public function dataTable(Request $request)
    {
            $from=$request->get('start_date');
            $todate=$request->get('end_date');
            $Department=$request->get('Department');
if (is_null($from) or is_null($todate))
{
    $model = interactions::with('DataPengunjung')->get();
}
elseif($Department != 'All' )
{
    $model = interactions::with('DataPengunjung')
    ->where('tujuan','like',$Department)
    ->get();

}
else
{
        $model = interactions::with('DataPengunjung')
        ->whereDate('waktu_masuk','>=',$from)
        ->whereDate('waktu_masuk','<=',$todate)
        ->get();
}
        return DataTables::of($model)
        ->addColumn('Foto', function ($model) {
            return '<img src=" '.$model->Foto.' "/>';})
            ->addColumn('action', function ($model) {
                return view('_action', [
                    'model' => $model,
                    'url_show' => route('daftartamu.show', $model->NIK),
                    'url_edit' => route('daftartamu.edit', $model->id),
                    'url_destroy' => route('daftartamu.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
}

public function ExportInterction()
{
    return MaatwebsiteExcel::download(new InteractionsExport(),'DaftarTamu.xlsx');
}

}
