<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index(Request $request){
        
        return view('admin/VideoGalleryView');
    }

    public function addVideos(Request $request){
        $this->validate($request, [
            'file.*' => 'required|file|mimetypes:video/mp4',
        ]);
        if ($request->hasFile('file'))
        {
            $path = $request->file('file')->store('videos', ['disk' =>'public']);
        }
        return response("Here");
     }    
}
