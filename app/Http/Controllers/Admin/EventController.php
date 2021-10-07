<?php

namespace App\Http\Controllers\Admin;
use App\Models\Event;
use App\Models\ManageEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

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

    public function EventList(Request $request){
        if($request->ajax())
        {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];

            $event = ManageEvent::where('status','!=','2');

        
            $data = array();
            
            if(!empty($search)){
                $where = "( name LIKE '%".$search."%' )";
                $event->whereRaw($where);
            }

            if ($column == 1) {
                $event->orderBy('id',$asc);
             } elseif($column == 2) {
                $event->orderBy('name',$asc);
             } elseif($column == 3) {
                $event->orderBy('status',$asc);
             } elseif($column == 4) {
                 $event->orderBy('created_date_time',$asc);
             } 

             $eventCount = $event->count();
             $events = $event->offset($start)->limit($length)->get();  
             $filteredValue = 0;
             
            foreach($events as $key => $value){
                
                $nestedValue = array();
                $nestedValue[0] = $start+$key+1; 
                $nestedValue[1] = $value->name;
                if($value->status == 1){
                    $nestedValue[2] = 'Active';
                }
                else{
                    $nestedValue[2] = "Inactive";
                }       
                $nestedValue[3] = '<div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    Action
                                    <span class="caret">
                                    </span>
                                    </button>
                                    <ul class="dropdown-menu text-center">
                                    <li><a href="http://127.0.0.1:8000/admin/edit-event?id='.$value->events_id.'">Edit</a></li>
                                    <li><a href="http://127.0.0.1:8000/admin/delete-event?id='.$value->events_id.'" data-delete-link= class="user-delete-link">Delete</a></li>
                                    </ul>
                                </div>';
                $data[] = $nestedValue;
            }
            $json_data = array(
                "recordsTotal"    => $eventCount,
                "recordsFiltered" => $eventCount,
                "data"            => $data
            );
            echo json_encode($json_data);
            exit;
        }


        return view('admin/EventTable');
    }

    public function DeleteEvent(Request $request){
        // dd($request);
        $this->validate($request,[
            'id'=> 'required|numeric',
        ]);
        $id = $request->id;
        // dd($id);
        ManageEvent::where(['events_id'=>$id])->first()->update(['status'=>'2']);
        return redirect()->back()->with('message','Event Deleted Succesfully');


    }   
    
    public function EditEvent(Request $request){
        $id = $request->id;
        $data = ManageEvent::GetEvent($id);
        $eventTypes = Event::all();
        return view('admin/ManageEventView')->with(compact('data','eventTypes','id'));

    }
    public function EditEventData(Request $request){
        $rules = [
            'name' => 'required|',
            "place" => "required|",
            'event_date_time' =>'required',
            'description' =>'required',
            'status' =>'required'
	    ];
	    $validator = Validator::make($request->all(), $rules);
	    if($validator->fails()){
            $response["message"] = "errors";
            $response["errors"] = $validator->errors()->toArray();
            $response["errors_keys"] = array_keys($validator->errors()->toArray());
            $er = $response["errors_keys"];
            $n = $er[0];
            return redirect()->back()->with('error',$response['errors'][$n][0]);
        }
        $data['name'] = $request->name;
        $data['place'] = $request->place;
        $data['event_date_time'] = $request->event_date_time;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['events_id'] = $request->id;
        ManageEvent::UpdateEvent($data);        
        return redirect()->route('event_list')->with('message','Event Updated');

    }

}