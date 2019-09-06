<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\pengunjung;
use SebastianBergmann\CodeCoverage\Report\Xml\Method;
use Faker\Provider\cs_CZ\DateTime;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengunjungs=auth()->user()->pengunjung;
        $pengunjungs = pengunjung::all();

        foreach($pengunjungs as $pengunjung)
        { $pengunjung->view_interaction =
        [
        'href'=>'api/v1/pengunjung/' . $pengunjung->id,
        'method'=> 'GET'

        ];
        }
        $response =[
            'msg'=>'Daftar Pengunjung',
            'Pengunjung' => $pengunjungs
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
            'NIK'=>'required',
            'Nama'=>'required',
            'TempatLahir'=>'required',
            'TglLahir'=>'required',
            'JenisKelamin'=>'required',

            'GolDarah'=>'required',
            'Alamat'=>'required',
            'RT'=>'required',
            'RW'=>'required',
            'Kecamatan'=>'required',

            'Kelurahan'=>'required',
            'Agama'=>'required',
            'status'=>'required',
            'Pekerjaan'=>'required',
            'Provinsi'=>'required',

            'Kota'=>'required',
            'Kewarganegaraan'=>'required',
             'Foto'=>'required',
            //  'TandaTangan'=>'required',
            //  'FingerPrint'=>'required',
        ]);

$NIK=$request->input('NIK');
$Nama=$request->input('Nama');
$TempatLahir=$request->input('TempatLahir');
$TglLahir=$request->input('TglLahir');
$JenisKelamin=$request->input('JenisKelamin');
$GolDarah=$request->input('GolDarah');
$Alamat=$request->input('Alamat');
$RT=$request->input('RT');
$RW=$request->input('RW');

$Kecamatan=$request->input('Kecamatan');
$Kelurahan=$request->input('Kelurahan');
$Agama=$request->input('Agama');
$status=$request->input('status');
$Pekerjaan=$request->input('Pekerjaan');
$Provinsi=$request->input('Provinsi');
$Kota=$request->input('Kota');
$Kewarganegaraan=$request->input('Kewarganegaraan');
$Foto = $request->Foto;  // your base64 encoded
$Foto = str_replace('data:image/png;base64,', '', $Foto);
$Foto = str_replace(' ', '+', $Foto);
$FotoName = $NIK.'.'.'png';
Storage::put('/foto/' . $FotoName, base64_decode($Foto));
$Foto=$request->input('Foto');
$TandaTangan=$request->input('TandaTangan');
$FingerPrint=$request->input('FingerPrint');

$pengunjungs=auth()->user()->pengunjung;
$pengunjungs =new pengunjung([
    'NIK'=>$NIK,
    'Nama'=>$Nama,
    'TempatLahir'=>$TempatLahir,
    'TglLahir'=>$TglLahir,
    'JenisKelamin'=>$JenisKelamin,
    'GolDarah'=>$GolDarah,
    'Alamat'=>$Alamat,
    'RT'=>$RT,
    'RW'=>$RW,
    'Kecamatan'=>$Kecamatan,
    'Kelurahan'=>$Kelurahan,
     'Agama'=>$Agama,
     'status'=>$status,
     'Pekerjaan'=>$Pekerjaan,
     'Provinsi'=>$Provinsi,
     'Kota'=>$Kota,
     'Kewarganegaraan'=>$Kewarganegaraan,
     'Foto'=>Storage::url('app/foto/'.$FotoName),
     'TandaTangan'=>$TandaTangan,
     'FingerPrint'=>$FingerPrint

]);
if ($pengunjungs ->save()){
    $pengunjungs->view_pengunjung = [

        'href'=>'api/v1/pengunjung/'.$pengunjungs->id,
        'method' => 'POST'
    ];
    $message=[
        'msg' =>'Pengunjung Ditambahkan',
        'data' => $pengunjungs
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
        $pengunjungs=auth()->user()->pengunjung;
        $pengunjungs = pengunjung::findOrFail($id);
        $pengunjungs->view_pengunjungs = [
        'href'=>'api/v1/pengunjung/'.$pengunjungs->id,
    'method'=>'GET'
        ];

        $response =[
            'msg'=>'detail Pengunjung',
            'Data'=> $pengunjungs
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
        $pengunjungs=auth()->user()->pengunjung;
        $pengunjungs = pengunjung::where('NIK', '=', $id)->firstOrFail();
        $pengunjungs->delete();
        $response =[
            'msg'=>'Delete pengunjung',
            'Data'=> $pengunjungs
        ];
return response()->json($response,200);
    }
}
