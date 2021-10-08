<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingsModel;

class UserController extends Controller
{
    public function index()
    {
        $temple_data = SettingsModel::all()->first();

        return view('user/home')->with(compact('temple_data'));
    }
}
