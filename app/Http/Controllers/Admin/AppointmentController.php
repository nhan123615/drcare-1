<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\appointment;
use App\Models\Doctor;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     /*    if (request()->is('appointment')) {
            $doctors =   Doctor::all();
            return view('drcare.appointment',compact('doctors'));
        }else{   
            $appointments =   appointment::all();
            return view('admin.appointment.show',compact('appointments'));
        }
        $appointments =   appointment::all();
        return view('admin.appointment.show',compact('appointments')); */
        $appointments =   appointment::all();
        return view('admin.appointment.show',compact('appointments'));
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
          /* return $request->all(); */
          $this->validate($request,[
            'firstname' =>'required',
            'lastname' =>'required',
            'doctor' =>'required',
            'phone' =>'required',
            'date' =>'required',
            'time' =>'required',
            'message' =>'required',
        ]);
        
      
        $appointment = new appointment;
        $appointment->first_name = $request->firstname;
        $appointment->last_name = $request->lastname;
        $appointment->doctor_id = $request->doctor;
        $appointment->phone = $request->phone;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->message = $request->message;
        $appointment->save();
       /*  $appointment->doctors()->sync($request->doctors); */

       return redirect()->back()->with('message', 'Submit Successfull !');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        appointment::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Delete Successfull !'); 
       
    }
}
