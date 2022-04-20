<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Http\Requests\StoreanswerRequest;
use App\Http\Requests\UpdateanswerRequest;

class AnswerController extends Controller
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
     * @param  \App\Http\Requests\StoreanswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreanswerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateanswerRequest  $request
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateanswerRequest $request, answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(answer $answer)
    {
        //
    }
}
