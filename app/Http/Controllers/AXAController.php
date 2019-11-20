<?php

namespace App\Http\Controllers;

use App\AXA;
use Illuminate\Http\Request;


class AXAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\AXA  $aXA
     * @return \Illuminate\Http\Response
     */
    public function show(AXA $aXA)
    {

        $pengunjungs = AXA::where('NIK', '=', $aXA)->firstOrFail();
        $pengunjungs->view_pengunjungs;

        $response =[
            'Data'=> $pengunjungs
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AXA  $aXA
     * @return \Illuminate\Http\Response
     */
    public function edit(AXA $aXA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AXA  $aXA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AXA $aXA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AXA  $aXA
     * @return \Illuminate\Http\Response
     */
    public function destroy(AXA $aXA)
    {
        //
    }
}
