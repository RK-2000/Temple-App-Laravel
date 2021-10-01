<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function eventType(){
        return view('admin/ManageEventTypeView');
    }

    public function event(){
        return view('admin/ManageEventView');
    }
    
}
