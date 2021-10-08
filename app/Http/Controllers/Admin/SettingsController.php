<?php

namespace App\Http\Controllers\Admin;

use App\Models\SettingsModel;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SettingsController extends Controller
{
    public function settingsIndex(){
        $data = SettingsModel::all()->count();
        if ($data==0){
            return view('admin/settingsView');
        }else{
            $data = SettingsModel::first();
            return view('admin/settingsView')->with(compact('data'));
        }
    }

    public function settingUpdate(Request $request){
        $data = new SettingsModel;
        // dd($data);
        $rules = [
            'temple_name' => 'required|max:1000',
            "temple_logo" => "mimes:jpg,png,jpeg,svgmax:5000",
            'address' =>'required',
            'about_us' =>'required'
	    ];

        // dd($imageName);
	    $validator = Validator::make($request->all(), $rules);
	    if($validator->fails()){
            $response["message"] = "errors";
            $response["errors"] = $validator->errors()->toArray();
            $response["errors_keys"] = array_keys($validator->errors()->toArray());
            $er = $response["errors_keys"];
            $n = $er[0];
            return redirect()->route('settings')->with('error',$response['errors'][$n][0]);
        }
        
        if((SettingsModel::all()->count())>0){
            $setting = SettingsModel::first();
            if($request->temple_logo){
                $imageName = time().'.'.$request->temple_logo->extension();
                $request->temple_logo->move(public_path('images'), $imageName);
                $img_path = '/images/'.$imageName;
                $setting->temple_logo = $img_path;
    
            }
            $setting->temple_name = $request->temple_name;
            $setting->address = $request->address;
            $setting->about_us = $request->about_us;
            $setting->facebook_link = $request->facebook_link;
            $setting->youtube_link = $request->youtube_link;
            $setting->twitter_link = $request->twitter_link;
            $setting->instagram_link = $request->instagram_link;
            $setting->save();
            return redirect()->route('settings')->with('message','Settings Updated');
        }
        if($request->temple_logo){
            $imageName = time().'.'.$request->temple_logo->extension();
            $request->temple_logo->move(public_path('images'), $imageName);
            $img_path = '/images/'.$imageName;
            $data->temple_logo = $img_path;

        }
        $data->temple_name = $request->temple_name;
        $data->address = $request->address;
        $data->about_us = $request->about_us;
        $data->facebook_link = $request->facebook_link;
        $data->youtube_link = $request->youtube_link;
        $data->twitter_link = $request->twitter_link;
        $data->instagram_link = $request->instagram_link;
        $data->save();
        
        return redirect()->route('settings')->with('message','Settings Added');
        


    }
}
