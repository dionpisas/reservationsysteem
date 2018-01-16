<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Date;

class DatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $date = Date::all();

        return view('dates.index', compact('date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // change format of date
        $date= strtotime(request('start_date'));
        $dateF = date("Y/m/d",$date);

        // carbon now
        $now =now();
        //create new date
        Date::create([

            'start_date' =>  $dateF,
            'created_at' => $now
        ]);

        return redirect()->route('dates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Date $date)
    {

        return view('dates.show', compact('date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Date $date)
    {

        return view('dates.edit', compact('date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Date $date)
    {
        // carbon now
        $now =now();
        // change format of date
       $a = $date->start_date= strtotime(request('start_date'));
        $dateF = date("Y/m/d",$a);


        $date->start_date = $dateF;
        $date->updated_at = $now;
       $date->save();

       return redirect()->route('dates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Date $date)
    {
        $dat = Date::find($date->id);
        $dat->delete();
        return redirect()->route('dates.index');
    }
}
