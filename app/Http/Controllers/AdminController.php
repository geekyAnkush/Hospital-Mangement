<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }
    public function upload(Request $request){
        $doctor = new doctor;
        $image = $request->file;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorImage',$imageName);
        $doctor->image = $imageName;

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->special;

        $doctor->save();
        return redirect()->back()->with('message','Doctor added successfully');
    }
    public function showappointment(){
        $data = appointment::all();
        return view('admin.showappointment',compact('data'));

    }
    public function approved($id){
        $data = appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }
    public function cancelled($id){
        $data = appointment::find($id);
        $data->status = 'Cancelled';
        $data->save();
        return redirect()->back();
    }
    public function showDoctors(){
        $data = Doctor::all();
        return view('admin.showDoctors',compact('data'));
    }
    public function deldoc($id){
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updoc($id){
        $data = Doctor::find($id);

        return view('admin.update_doc',compact('data'));
    }
    public function editdoc(Request $request, $id){
        $doc = Doctor::find($id);
        $doc->name = $request->dname;
        $doc->phone = $request->phone;
        $doc->speciality = $request->speciality;
        $doc->room = $request->room;

        $image = $request->file;

        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorImage',$imageName);
            $doc->image = $imageName;
        }

        $doc->save();

        return redirect()->back()->with('message','Doctor Details Updated Successfully');

    }
}
