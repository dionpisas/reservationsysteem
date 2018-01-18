<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Appointment;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check if login and admin
        if(Auth::check() &&  Auth::user()->isAdmin()){
            // get users
            $users = User::where('roles_id', 1)->get();
            //get admins
            $admin = User::where('roles_id', 2)->get();
            return view('users.index', compact('users', 'admin'));

        }else{
            //redirect for normal user to user available appoitnments
            session()->flash('message', 'U ben niet bevoegd om deze pagina te bezoeken.');
            return redirect()->route('appointments.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check if login and admin
        if(Auth::check() &&  Auth::user()->isAdmin()){
            // get all roles
            $roles = Role::all();
            return view('users.create', compact('roles'));

        }else{
            //redirect for normal user to user available appoitnments
            session()->flash('message', 'U ben niet bevoegd om deze pagina te bezoeken.');
            return redirect()->route('appointments.index');
        }
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

//        dd(request('roles_id'));

        //get users account with same name as input
        $mail = User::where('name', request('name'))->get();
        //get users email with same email as input
        $uname = User::where('email', request('email'))->get();

        //time now
        $now = now();

        //if count mail and username equal to 0 make new user
        if(count($mail) == 0 && count($uname) == 0){

            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'created_at' => $now
            ]);

        }else{
            session()->flash('message', 'Er bestaat al een gebruiker met de ingevulde username of email, probeer iets anders.');
            return redirect()->route('users.create');
        }
        session()->flash('message', 'Gebruiker succesvol aangemaakt.');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //check if login and admin
        if(Auth::check() &&  Auth::user()->isAdmin()){
            // modal vars
            $header = 'Gebruiker verwijderen';
            $text = 'Weet u zeker dat u deze geberuiker  wilt verwijderen?';
            return view('users.show', compact('user', 'header', 'text'));

        }else{
            //redirect for normal user to user available appoitnments
            session()->flash('message', 'U ben niet bevoegd om deze pagina te bezoeken.');
            return redirect()->route('appointments.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //check if login and admin
        if(Auth::check() &&  Auth::user()->isAdmin()){
            // get all roles
            $roles = Role::all();
            return view('users.edit', compact('user', 'roles'));

        }else{
            //redirect for normal user to user available appoitnments
            session()->flash('message', 'U ben niet bevoegd om deze pagina te bezoeken.');
            return redirect()->route('appointments.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        dd($user->id);
        // carbon now
        $now =now();

        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'roles_id' => 'integer|required'
        ]);



        if($user->name !== request('name')){
            $user->name = request('name');
        }
        if($user->email !== request('email')){
            $user->email = request('email');
        }
        if($user->roles_id !== request('roles_id')){
            $user->roles_id = request('roles_id');
        }
        if($user->role !== request('roles_id')){

        }
        if (!Hash::check(request('password'), $user->password)) {
            $user->password = bcrypt(request('password'));
        }
        $user->save();
        session()->flash('message', 'Gebruiker succesvol aangepastt.');
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //find appointment
        $user = User::find($user->id);

        //remove user id from appointment before delete
        $this->quickupdate($user);

        //delete appointment
        $user->delete();
        // succes message
        session()->flash('message', 'Gebruiker succesvol verwijderd');
        //redirect
        return redirect()->route('users.index');
    }

    public function quickupdate(User $user)
    {
        //function to get all appointments with a specific user_id and update user id to NULL
        $appointments = Appointment::where('user_id', $user->id)->get();
        foreach($appointments as $app){
           $app->user_id = NULL;
            $app->save();
        }

    }
}
