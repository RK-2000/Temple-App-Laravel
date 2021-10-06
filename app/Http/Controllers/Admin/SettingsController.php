<?php

namespace App\Http\Controllers\Admin;

use App\Models\SettingsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function settingsIndex(){
        return view('admin/settingsView');
    }

    public function settingUpdate(Request $request){
        
        $data = new SettingsModel;
        $v = $this->validate($request, [
            'temple_name' => 'required|max:50',
            'temple_logo' =>'required',
            'address' =>'required',
            'about_us' =>'required'
        ]);
        dd($v);
        $data->temple_name = $request->temple_name;
        $data->temple_logo = $request->temple_logo;
        $data->address = $request->address;
        $data->about_us = $request->about_us;
        $data->facebook_link = $request->facebook_link;
        $data->youtube_link = $request->youtube_link;
        $data->twitter_link = $request->twitter_link;
        $data->instagram_link = $request->instagram_link;
        $data->save();
        dd('Success');
        


    }
}
