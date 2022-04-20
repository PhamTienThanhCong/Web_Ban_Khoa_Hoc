<?php

namespace App\Http\Controllers;

use App\Models\lesson;
use App\Http\Requests\StorelessonRequest;
use App\Http\Requests\UpdatelessonRequest;

class LessonController extends Controller
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
     * @param  \App\Http\Requests\StorelessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelessonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelessonRequest  $request
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelessonRequest $request, lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(lesson $lesson)
    {
        //
    }
}
