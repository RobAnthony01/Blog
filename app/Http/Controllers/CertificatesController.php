<?php

namespace App\Http\Controllers;

use App\certificates;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return certificates::orderBy('date', 'desc')->get();
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\certificates $certificates
     *
     * @return \Illuminate\Http\Response
     */
    public function show(certificates $certificates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\certificates $certificates
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(certificates $certificates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\certificates        $certificates
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, certificates $certificates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\certificates $certificates
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificates $certificates)
    {
        //
    }
}
