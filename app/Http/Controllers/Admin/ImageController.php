<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Image;

class ImageController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $images = Image::where('status','!=','2')->orderBy('created_date_time', 'DESC')->get();
            foreach($images as $image){
                
                $html = '   <div class="card m-2 shadow">
                                <img class="card-img-top" src = "'.url('/').'/'.$image->name.'">
                                <div class="card-body p-4 text-center">
                                    <a href="'.route('delete.images').'?id='.$image->id.'" class="btn btn-dark">Delete</a>
                                </div>       
                            </div>';
                $data[] = $html;
            }
            return response($data);
        }       
        return view('admin/ImageGallery');
    }

    public function addImages(Request $request){
        
        if($request->hasFile('file')) {
            $rules = [
                'file'	=> 'required',
                'file.*' => 'required|mimes:jpeg,jpg,png|dimensions:max_width=1080,max_height=720'
            ];
    
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                $response["message"] = "errors";
                $response["errors"] = $validator->errors()->toArray();
                $response["errors_keys"] = array_keys($validator->errors()->toArray());
                return response()->json($response,400);
            }
            $destinationPath = 'ImageGallery';
     
            $extension = $request->file('file')->getClientOriginalExtension();
     
            $validextensions = array("jpeg","jpg","png","pdf");
     
            if(in_array(strtolower($extension), $validextensions)){
              $fileName = $request->file('file')->getClientOriginalName().time() .'.' . $extension;
              if($request->file('file')->move($destinationPath, $fileName)){
                $image = new Image;
                $image->category_id = 1;
                $image->name = $destinationPath.'/'.$fileName;
                $image->status = 1;
                $image->created_date_time = date('Y-m-d H:i:s');
                $image->save(); 
                return json_encode("Image Uploaded");
                return back()->with('message','Image Added');;
              }
              else{
                return json_encode("Image Was not uploaded");
              
              }
            }
            else{
                return json_encode("Extension not allowed");
            }
     
          }
    }

    public function deleteImages(Request $request){
        $image = Image::where('id',$request->id)->update(['status'=>'2']);
        return back()->with('message','Image Deleted');
    }
}
