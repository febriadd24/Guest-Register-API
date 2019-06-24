<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\interactions;
use App\pengunjung;
class DaftartamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('daftartamu');
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
        //
    }
    public function dataTable()
    {
        $model = interactions::query();
        return DataTables::of($model)
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

}
