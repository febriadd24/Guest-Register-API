<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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
        // $pengunjungs=auth()->user()->pengunjung;
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

             'FileFoto' => 'required|max:2048',
             'FileTTD' => 'required|max:2048',
             'FileFP' => 'required|max:2048',
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
$FileFoto = $request->file('FileFoto')->storeAs('public/Foto', $NIK.'.bmp');
$FileTandaTangan=$request->file('FileTTD')->storeAs('public/TTD', $NIK.'.bmp');
$FileFingerPrint=$request->file('FileFP')->storeAs('public/FP', $NIK.'.bmp');
$Foto = $request='storage/Foto/'.$NIK.'.bmp';
$TandaTangan='storage/TTD/'.$NIK.'.bmp';
$FingerPrint=$request='storage/FP/'.$NIK.'.bmp';

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
     'Foto'=>$Foto,
     'TandaTangan'=>$TandaTangan,
     'FingerPrint'=>$FingerPrint,
     $FileFoto,
     $FileTandaTangan,
     $FileFingerPrint,

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
        $pengunjungs = pengunjung::where('NIK', '=', $id)->firstOrFail();
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
