<?php

namespace App\Http\Controllers;

use App\Models\result;
use App\Http\Requests\StoreresultRequest;
use App\Http\Requests\UpdateresultRequest;

class ResultController extends Controller
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
     * @param  \App\Http\Requests\StoreresultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreresultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateresultRequest  $request
     * @param  \App\Models\result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateresultRequest $request, result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(result $result)
    {
        //
    }
}
