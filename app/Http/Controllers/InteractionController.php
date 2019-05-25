<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interactions;
class InteractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $intercations = interactions::all();
foreach($intercations as $interaction)
{ $interaction-> view_interaction =
[
'href'=>'api/v1/interaction/' . $interaction->id,
'method'=> 'GET'

];
}
$response =[
    'msg'=>'Daftar Interaksi Tamu',
    'interaction' => $interaction
];
return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function create()
//     {
//         //

// }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'NIK'=>'required',
            'Nama'=>'required',
        ]);
$title=$request->input('title');
$title=$request->input('NIK');
$title=$request->input('Nama');
$title=$request->input('Tujuan');
$title=$request->input('description');
$title=$request->input('waktu_masuk');
$title=$request->input('operator_id');
$title=$request->input('notified');
$title=$request->input('aceppted');


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
