<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::where('statuses_id', 1)->get();

        return view('reservations.index', compact('appointments'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        if($appointment->user_id == 0){
            $header = 'Afspraak reserveren';
            $text = 'Weet u zeker dat u deze afspraak wilt reserveren?';
            $warning = '';
        }else{
            $header = 'Reservering annuleren';
            $text = 'Weet u zeker dat u deze reservering wilt annuleren?';
            $warning = 'Voordat u het afspraak annuleerd moet u contact opnemen met uw nagelstyliste zodat er geen kosten in rekening gebracht zullen worden bij uw volgende afspraak';
        }


        return view('reservations.show', compact('appointment', 'header', 'text', 'warning'));
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
    public function update(Request $request, Appointment $appointment)
    {
        $id = Auth::id();
        if($appointment->user_id != $id){

            $appointment->user_id = $id;
            $appointment->statuses_id = 2;
            $appointment->save();
            session()->flash('message', 'Reservering succesvol geplaatst.');
            return redirect()->route('appointments.index');
        }else{

            $appointment->user_id = NULL;
            $appointment->statuses_id = 1;
            $appointment->save();
            session()->flash('message', 'Reservering succesvol geanulleerd.');
            return redirect()->route('appointments.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
