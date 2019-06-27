<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tujuan;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tujuans = tujuan::all();
        foreach($Tujuans as $Tujuan)
        { $Tujuans->view_interaction =
        [
        'href'=>'api/v1/tujuan/' . $Tujuans->id,
        'method'=> 'GET'

        ];
        }
        $response =[
            'msg'=>'Daftar Tujuan',
            'Tujuan' => $Tujuans
        ];
        return response()->json($response, 200);
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
        $Tujuans = tujuan::findOrFail($id);
        $Tujuans->view_Tujuans = [
        'href'=>'api/v1/Tujuan/'.$Tujuans->id,
    'method'=>'GET'
        ];

        $response =[
            'msg'=>'detail Tujuan',
            'Data'=> $Tujuans
        ];
return response()->json($response,200);
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
