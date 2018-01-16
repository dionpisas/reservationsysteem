<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Times;

class TimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Times::all();

        return view('times.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('times.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // carbon now
        $now =now();

        Times::create([
            'start_time' => request('start_time'),
            'end_time' => request('end_time'),
            'created_at' => $now,
            'updated_at' => $now
            ]);

        return redirect()->route('times.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Times $time)
    {

        return view('times.edit', compact('time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Times $time)
    {
        $time->start_time = request('start_time');
        $time->end_time = request('end_time');
        $time->save();

        return redirect()->route('times.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Times $time)
    {
        $a = Times::find($time->id);
        $a->delete();
        return redirect()->route('times.index');
    }
}
