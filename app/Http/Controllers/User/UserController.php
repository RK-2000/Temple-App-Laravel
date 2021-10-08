<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingsModel;
use App\Models\Event;

class UserController extends Controller
{
    public function index()
    {
        $temple_data = SettingsModel::first();
        $events = Event::where('status','1')->get();
        return view('user/home')->with(compact('temple_data','events'));
    }
}
