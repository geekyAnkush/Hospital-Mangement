<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\appointment;

class HomeController extends Controller
{
    public function  redirect()
    {
        if(Auth::id()){
            if(Auth::user()->user_type=='0')
            {
                $doctor = doctor::all();
                return view('user.home',compact('doctor'));
            }else{
                $name = Auth::user()->name;
                return view('admin.home',compact('name'));
            }

        }else{
            return redirect()->back();
        }
    }
    public function  index(){

        if(Auth::id()){
            return redirect('home');
        }else{
            $doctor = doctor::all();

            return view('user.home',compact('doctor'));
        }

    }
    public function  appoint(Request $request){
        $data = new appointment;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->doctor = $request->doctor;
        $data->date = $request->date;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->status = "In Progress";
        if(Auth::id()){
            $data->user_id = Auth::user()->id;
        }
        $data->save();

        return redirect()->back()->with('message','Appointment Booked. We will Contact you soon');
    }
    public function myappointment(){
        if(Auth::id()){
            $uid = Auth::user()->id;
            $appoint = appointment::where('user_id',$uid)->get();
            return view('user.my_appointment',compact('appoint'));
        }else{
            return redirect()->back();
        }

    }
    public function cancel_appoint($id){
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
