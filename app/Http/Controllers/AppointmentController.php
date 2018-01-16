<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Appointment;
use App\User;
use App\Status;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $appointment = Appointment::find(1)->date;
        $appointment= Appointment::all();
//        dd($appointment);
        return view('appointments.index', compact('appointment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $users =  User::where('roles_id', 1)->get();
        $status = Status::where('status_types_id', 1)->get();
        return view('appointments.create', compact( 'status', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'user_id'     =>  'integer|nullable',
            'statuses_id' => 'required|integer',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i',
            'date'        => 'required'
        ]);

        // change date format
        $date= strtotime(request('date'));
        $dateF = date("Y/m/d",$date);

        // check if there is an appointment on specific date
        $appcount = Appointment::where('date', $dateF)->get();


        // carbon now
        $now =now();

        if(count($appcount) == 0){
            if(!request('user_id')){
                //1 beschikbaar/ 2 niet beschikbaar
                $status = 1;

                Appointment::create([
                    'date' => $dateF,
                    'statuses_id' => $status,
                    'start_time' => request('start_time'),
                    'end_time' => request('end_time'),
                    'created_at' => $now
                ]);
            }else{
                $status = 2;
                Appointment::create([
                    'user_id' => request('user_id'),
                    'date' => $dateF,
                    'statuses_id' => $status,
                    'start_time' => request('start_time'),
                    'end_time' => request('end_time'),
                    'created_at' => $now
                ]);
            }
        }else{
            session()->flash('message', 'Je hebt al een afspraak op de gekozen datum, selecteer een andere.');
            return redirect()->route('appointment.create');
        }

            session()->flash('message', 'Afspraak succesvol aangepast');
        return redirect()->route('appointment.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
//        dd($appointment);
        $header = 'Afspraak verwijderen';
        $text = 'Weet u zeker dat u deze afspraak wilt verwijderen?';


        return view('appointments.show', compact('appointment', 'header', 'text'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Appointment $appointment)
    {   //get all users except admin
        $users =  User::where('roles_id', 1)->get();
        //get all statuses for appointments
        $status = Status::where('status_types_id', 1)->get();

        return view('appointments.edit', compact('appointment', 'users', 'status'));
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
        // validate input
        $this->validate(request(),[
            'user_id'     => 'integer|nullable',
            'statuses_id' => 'required|integer',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i',
            'date'        => 'required'
        ]);

        // carbon now
        $now =now();

        // user id
        $userid = NULL;

        //status /1beschikbaar /2 niet beschikbaar
        $status = 2;

        // change date format
        $date= strtotime(request('date'));
        $dateF = date("Y/m/d",$date);

        // check if there is an appointment on specific date
        $appcount = Appointment::where('date', $dateF)->get();

        if(count($appcount) == 0){
            //check if there is post user id
            if (!request('user_id')){

                // update function
                Appointment::where('id', $appointment->id)
                    ->update([
                        'user_id' => $userid,
                        'statuses_id' => request('statuses_id'),
                        'date' => $dateF,
                        'start_time' => request('start_time'),
                        'end_time' => request('end_time'),
                        'updated_at' => $now
                    ]);
            }else{

                // update function
                Appointment::where('id', $appointment->id)
                    ->update([
                        'user_id' => request('user_id'),
                        'date' => $dateF,
                        'statuses_id' => $status,
                        'start_time' => request('start_time'),
                        'end_time' => request('end_time'),
                        'updated_at' => $now
                    ]);
            }
        }else{
            session()->flash('message', 'Je hebt al een afspraak op de gekozen datum, selecteer een andere.');
            return redirect()->route('appointment.edit', $appointment->id);
        }

        session()->flash('message', 'Afspraak succesvol aangemaakt');
        return redirect()->route('appointment.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //find appointment
        $app = Appointment::find($appointment->id);

        //delete appointment
        $app->delete();
        session()->flash('message', 'Afspraak succesvol verwijderd');
        return redirect()->route('appointment.index');
    }

}
