<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interactions;
use SebastianBergmann\CodeCoverage\Report\Xml\Method;
use Faker\Provider\cs_CZ\DateTime;

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
{ $interaction->view_interaction =
[
'href'=>'api/v1/interaction/' . $interaction->id,
'method'=> 'GET'

];
}
$response =[
    'msg'=>'Daftar Interaksi Tamu',
    'interactions' => $intercations
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
            'tujuan'=>'required',
            'description'=>'required',
        ]);

$title=$request->input('title');
$NIK=$request->input('NIK');
$Nama=$request->input('Nama');
$Tujuan=$request->input('tujuan');
$description=$request->input('description');
$operator_id=$request->input('operator_id');
$notified=$request->input('notified');
$aceppted=$request->input('aceppted');
$waktu_masuk=date('Y-m-d H:i:s');

$intercations =new interactions([
'title'=>$title,
'NIK'=>$NIK,
'Nama'=>$Nama,
'tujuan'=>$Tujuan,
'description'=>$description,
'waktu_masuk'=>$waktu_masuk,
'operator_id'=>$operator_id,
'notified'=>$notified,
'aceppted'=>$aceppted,

]);
if ($intercations ->save()){
    $intercations->view_interaction = [

        'href'=>'api/v1/interaction/'.$intercations->id,
        'method' => 'GET'
    ];
    $message=[
        'msg' =>'Interactions Created',
        'data' => $intercations
        ];
        return response() ->json($message,200);
}

$response=[
    'msg' =>'Error During Created interaction'
];
return response() ->json($response,400);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $intercation = interactions::findOrFail($id);
        $intercation->view_interctions = [
        'href'=>'api/v1/interactions/',
    'method'=>'GET'
        ];

        $response =[
            'msg'=>'detail Interactions',
            'meeting'=> $intercation
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
            'waktu_keluar'=>'required'
        ]);

$outtime=$request->input('waktu_keluar');


$intercations = interactions::findOrFail($id);

$intercations->waktu_keluar=$outtime;

if (!$intercations ->update()){
    return response()->json([
        'message' => 'Error during update'
    ], 404);
}
    $intercations->view_interaction = [

        'href'=>'api/v1/interaction/'.$intercations->id,
        'method' => 'GET'
    ];
    $message=[
        'msg' =>'Interactions Updated',
        'data' => $intercations
        ];
        return response() ->json($message,200);

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
