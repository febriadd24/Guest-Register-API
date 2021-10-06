<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BANKDIY;

class BANKDIYController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $BANKDIYs=auth()->user()->BANKDIY;
        $BANKDIYs = BANKDIY::all();

        foreach($BANKDIYs as $BANKDIY)
        { $BANKDIY->view_interaction =
        [
        'href'=>'api/v1/BANKDIY/' . $BANKDIY->id,
        'method'=> 'GET'

        ];
        }
        $response =[
            'msg'=>'Daftar BANKDIY',
            'BANKDIY' => $BANKDIYs
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
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
            'nik'=>'required',
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'gender'=>'required',

            'golongan_darah'=>'required',
            'alamat'=>'required',
            'rt'=>'required',
            'rw'=>'required',
            'kecamatan'=>'required',

            'kelurahan'=>'required',
            'agama'=>'required',
            'marital_status'=>'required',
            'pekerjaan'=>'required',
            'provinsi'=>'required',

            'kabupaten'=>'required',
            'kewarganegaraan'=>'required',

             'photo_data' => 'required',
             'ttd_data' => 'required',
             'berlaku_hingga' => 'required',
             'user_operator' => 'required',
             'IP_address' => 'required'
            
        ]);

$nik=$request->input('nik');
$nama=$request->input('nama');
$tempat_lahir=$request->input('tempat_lahir');
$tanggal_lahir=$request->input('tanggal_lahir');
$gender=$request->input('gender');
$golongan_darah=$request->input('golongan_darah');
$alamat=$request->input('alamat');
$rt=$request->input('rt');
$rw=$request->input('rw');

$kecamatan=$request->input('kecamatan');
$kelurahan=$request->input('kelurahan');
$agama=$request->input('agama');
$marital_status=$request->input('marital_status');
$pekerjaan=$request->input('pekerjaan');
$provinsi=$request->input('provinsi');
$kabupaten=$request->input('kabupaten');
$kewarganegaraan=$request->input('kewarganegaraan');
$photo_data=$request->input('photo_data');
$ttd_data=$request->input('ttd_data');
$photo_data=$request->input('photo_data');
$berlaku_hingga=$request->input('berlaku_hingga');
$user_operator=$request->input('user_operator');
$IP_address=$request->input('IP_address');
$flag_verifikasi_manual=$request->input('flag_verifikasi_manual');


// $BANKDIYs=auth()->user()->BANKDIY;
$BANKDIYs =new BANKDIY([
    'nik'=>$nik,
    'nama'=>$nama,
    'tempat_lahir'=>$tempat_lahir,
    'tanggal_lahir'=>$tanggal_lahir,
    'gender'=>$gender,

    'golongan_darah'=>$golongan_darah,
    'alamat'=>$alamat,
    'rt'=>$rt,
    'rw'=>$rw,
    'kecamatan'=>$kecamatan,

    'kelurahan'=>$kelurahan,
    'agama'=>$agama,
    'marital_status'=>$marital_status,
    'pekerjaan'=>$pekerjaan,
    'provinsi'=>$provinsi,

    'kabupaten'=>$kabupaten,
    'kewarganegaraan'=>$kewarganegaraan,
     'photo_data' => $photo_data,
     'ttd_data' => $ttd_data,
     'berlaku_hingga'=>$berlaku_hingga,
     'user_operator' => $user_operator,
     'IP_address' => $IP_address,
     'flag_verifikasi_manual' => $flag_verifikasi_manual
]);

if ($BANKDIYs ->save()){
    $BANKDIYs->view_BANKDIY = [

        'href'=>'api/v1/BANKDIY/'.$BANKDIYs->id,
        'method' => 'POST'
    ];
    $message=[
        'msg' =>'BANKDIY Ditambahkan',
        'data' => $BANKDIYs
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
        $BANKDIYs=auth()->user()->BANKDIY;
        $BANKDIYs = BANKDIY::where('nik', '=', $id)->firstOrFail();
        $BANKDIYs->view_BANKDIYs = [
        'href'=>'api/v1/BANKDIY/'.$BANKDIYs->id,
        'method'=>'GET'
        ];

        $response =[
            'msg'=>'detail BANKDIY',
            'Data'=> $BANKDIYs
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
        // $BANKDIYs=auth()->user()->BANKDIY;
        $BANKDIYs = BANKDIY::where('nik', '=', $id)->firstOrFail();
        $BANKDIYs->delete();
        $response =[
            'msg'=>'Delete BANKDIY',
            'Data'=> $BANKDIYs
        ];
return response()->json($response,200);
    }
}
