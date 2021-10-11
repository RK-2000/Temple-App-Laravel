<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventType;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Http\Request;


class EventController extends Controller
{
    //Event Type functions

    //View event type list
    public function eventType(Request $request)
    {
        if ($request->ajax()) {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];


            $event = EventType::where('status', '!=', '2');
            $data = array();

            if (!empty($search)) {
                $where = "( name LIKE '%" . $search . "%' )";
                $event->whereRaw($where);
            }



            if ($column == 1) {
                $event->orderBy('id', $asc);
            } elseif ($column == 2) {
                $event->orderBy('name', $asc);
            } elseif ($column == 3) {
                $event->orderBy('status', $asc);
            } elseif ($column == 4) {
                $event->orderBy('created_date_time', $asc);
            }

            $eventsCount = $event->count();
            $events = $event->offset($start)->limit($length)->get();


            foreach ($events as $key => $value) {
                $nestedValue = array();
                $nestedValue[0] = $start + $key + 1;
                $nestedValue[1] = $value->name;
                if ($value->status == 1) {
                    $nestedValue[2] = 'Active';
                } else {
                    $nestedValue[2] = "Inactive";
                }
                $nestedValue[3] = $value->created_date_time;
                $nestedValue[4] = '<div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    Action
                                    <span class="caret">
                                    </span>
                                    </button>
                                    <ul class="dropdown-menu text-center">
                                    <li><a href="http://127.0.0.1:8000/admin/event-type?event_id=' . $value->event_types_id . '">Edit</a></li>

                                    <li><a href="http://127.0.0.1:8000/admin/delete-event-type?id=' . $value->event_types_id . '" data-delete-link="" class="user-delete-link">Delete</a></li>
                                    </ul>
                                </div>';
                $data[] = $nestedValue;
            }
            $json_data = array(
                "recordsTotal"    => $eventsCount,
                "recordsFiltered" => $eventsCount,
                "data"            => $data
            );
            echo json_encode($json_data);
            exit;
        }
        if ($request->get('event_id')) {
            $eventType = EventType::where('event_types_id', '=', $request->get('event_id'))->first();
            return view('admin/ManageEventTypeView')->with(compact('eventType'));
        }
        return view('admin/ManageEventTypeView');
    }


    public function addEventType(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required'
        ]);

        $created_date_time = date('Y-m-d H:i:s');
        $data = new EventType;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->created_date_time = $created_date_time;
        $data->save();

        if ($validator) {
            return redirect()->route('event_type')->with('message', 'Event Added');
        } else {
            return redirect()->route('event_type')->with('error', 'Event Not Added');
        }
    }

    //Edit event Type
    public function UpdateEventType(Request $request)
    {

        $this->validate($request, [
            'event_types_id' => "required|numeric|exists:tbl_master_event_types,event_types_id",
            'name' => 'required|unique:tbl_master_event_types,name,' . $request->event_types_id . ',event_types_id',
            'status' => 'required',
        ]);
        $event = EventType::where('event_types_id', $request->event_types_id)->first();
        $event->name = $request->name;
        $event->event_types_id = $request->event_types_id;
        $event->updated_date_time = date('Y-m-d H:i:s');
        $event->status = $request->status;
        if ($event->save()) {
            return redirect()->route('event_type')->with("message", "Event Type is updated");
        } else {
            return redirect()->route('event_type')->with("error", "Event Type could not be updated");
        }
    }

    // Delete Event Type
    public function DeleteEventType(Request $req)
    {   
        // dd($req);
        $event = EventType::where('event_types_id', $req->id)->get()->first();
        $event->status = 2;
        $event->name = $event->name . "_del";
        $event->save();
        return redirect()->route('event_type')->with("message", "Event is deleted");
    }



    // Event functions

    //View Event List

    //View Add Event Form

    //View Update Event Form

    //Delete Event
    public function event(Request $request)
    {   
        if($request->get('id')){
            $data = Event::where('events_id', $request->id)->first();
            $eventTypes = EventType::all();
            return view('admin/ManageEventView')->with(compact('data','eventTypes'));
        }
        $eventTypes = EventType::all();
        return view('admin/ManageEventView')->with(compact('eventTypes'));
    }

    public function AddEvent(Request $request)
    {   
        $this->validate($request, [
            'event_types_id' => 'required',
            'event_date_time' => 'required',
            'name' => 'required',
            'place' => 'required|max:250',
            'description' => 'required',
            'status' => 'required'
        ]);
        $data = new Event();
        $data->name = $request->name;
        $data->place = $request->place;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->event_types_id = $request->event_types_id;
        $data->event_date_time = $request->event_date_time;
        $data->save();
        return redirect()->route('event')->with('message', 'Event Added');
    }


    public function EventList(Request $request)
    {
        if ($request->get('prasad_id')) {
            $prasad = PrasadType::where('prasad_types_id', '=', $request->get('prasad_id'))->first();
            return view('admin/ManagePrasadView')->with(compact('prasad'));
        }
        if ($request->ajax()) {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];

            $event = Event::where('status', '!=', '2');


            $data = array();

            if (!empty($search)) {
                $where = "( name LIKE '%" . $search . "%' )";
                $event->whereRaw($where);
            }

            if ($column == 1) {
                $event->orderBy('id', $asc);
            } elseif ($column == 2) {
                $event->orderBy('name', $asc);
            } elseif ($column == 3) {
                $event->orderBy('status', $asc);
            } elseif ($column == 4) {
            }

            $eventCount = $event->count();
            $events = $event->offset($start)->limit($length)->get();
            $filteredValue = 0;

            foreach ($events as $key => $value) {

                $nestedValue = array();
                $nestedValue[0] = $start + $key + 1;
                $nestedValue[1] = $value->name;
                if ($value->status == 1) {
                    $nestedValue[2] = 'Active';
                } else {
                    $nestedValue[2] = "Inactive";
                }
                $nestedValue[3] = $value->event_date_time;
                $nestedValue[4] = '<div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    Action
                                    <span class="caret">
                                    </span>
                                    </button>
                                    <ul class="dropdown-menu text-center">
                                    <li><a href="http://127.0.0.1:8000/admin/manage-event?id=' . $value->events_id . '">Edit</a></li>
                                    <li><a href="http://127.0.0.1:8000/admin/delete-event?id=' . $value->events_id . '" data-delete-link= class="user-delete-link">Delete</a></li>
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


    public function EditEventView(Request $request)
    {
        $id = $request->id;
        // $data = Event::GetEvent($id);
        $data = Event::where('events_id',$id)->first();
        $eventTypes = EventType::all();

        return view('admin/ManageEventView')->with(compact('data', 'eventTypes', 'id'));
    }
    public function EditEventData(Request $request)
    {   
        // dd($request);
        $event = new Event;
        $rules = [
            'name' => 'required|',
            "place" => "required|",
            'event_date_time' => 'required',
            'description' => 'required',
            'status' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response["message"] = "errors";
            $response["errors"] = $validator->errors()->toArray();
            $response["errors_keys"] = array_keys($validator->errors()->toArray());
            $er = $response["errors_keys"];
            $n = $er[0];
            return redirect()->back()->with('error', $response['errors'][$n][0]);
        }
        $event->name = $request->name;
        $event->place = $request->place;
        $event->event_date_time = $request->event_date_time;
        $event->event_types_id = $request->event_types_id;
        $event->description = $request->description;
        $event->status = $request->status;

        DB::table('tbl_events')->where('events_id',$request->id)->update(['name'=>$event->name,'event_types_id'=>$event->events_types_id,'place'=>$event->place,'event_date_time'=>$event->event_date_time,'status'=>$event->status,'description'=>$event->description]);
        return redirect()->route('event_list')->with('message', 'Event Updated');
    }
}
