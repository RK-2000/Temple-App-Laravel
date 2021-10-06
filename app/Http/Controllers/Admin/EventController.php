<?php

namespace App\Http\Controllers\Admin;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function eventType(){
        return view('admin/ManageEventTypeView');
    }

    public function event(){
        $eventTypes = Event::all();
        
        return view('admin/ManageEventView',['eventTypes'=>$eventTypes]);
    }

    public function manageEvent(){
        return view('admin/ManageEventview');
    }

    public function addEventType(Request $request){
        $created_date_time = date('Y-m-d H:i:s');
        $data = new Event;
        // $data=array();
        $data->name = $request->name;
        $data->status = $request->status;
        $data->created_date_time = $created_date_time;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required'
        ]);
        if($validator) {
            Event::AddEventType($data);
            return redirect()->route('event_type')->with('message','Event Added');
        }else{
            return redirect()->route('event_type')->with('error','Event Not Added');
        }     
    }
    
}