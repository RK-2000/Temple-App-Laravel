<?php

namespace App\Http\Controllers\Admin;
use App\Models\Event;
use App\Models\ManageEvent;
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

    public function manageEvent(Request $request){
        $data = new ManageEvent;
        $this->validate($request, [
            'event_types_id' => 'required',
            'event_date_time' => 'required',
            'name' => 'required',
            'place' => 'required|max:250', 
            'description' => 'required',
            'status' => 'required'
        ]);
        $data->name = $request->name;
        $data->place = $request->place;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->event_types_id = $request->event_types_id;
        $data->event_date_time = $request->event_date_time;
        ManageEvent::AddEvent($data);

        return redirect()->route('event')->with('message','Event Added');
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