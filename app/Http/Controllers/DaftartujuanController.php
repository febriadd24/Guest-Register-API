<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\tujuan;


class DaftartujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('daftartujuan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = New tujuan;
        return view('detailtujuan',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'NIP' => 'required',
            'Nama' => 'required',
            'Availiable' => 'required',
            'Status' => 'required',
        ]);

        $model = tujuan::create($request->all());
        return $model;
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
        $model = tujuan::findOrFail($id);
        return view('Detailtujuan',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = tujuan::findOrFail($id);
        return view('Detailtujuan',compact('model'));
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
        $this->validate($request,[
            'Nama' => 'required',
            'Availiable' => 'required',
            'Status' => 'required|',
        ]);
        $model= tujuan::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model= tujuan::findOrFail($id);
        $model->delete();
    }
    public function dataTable()
    {
        $model = tujuan::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('_actioncrud', [
                    'model' => $model,
                    'url_show' => route('daftartujuan.show', $model->id),
                    'url_edit' => route('daftartujuan.edit', $model->id),
                    'url_destroy' => route('daftartujuan.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
}

}
