<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // view for categories
    public function index(){
        return view('admin/ManageCategoryView');
    }

    // Add Category
    public function addCategory(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);

        $created_date_time = date('Y-m-d H:i:s');
        $data = new Category;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->created_date_time = $created_date_time;
        $data->save();
        
        return redirect()->route('event_type')->with('message', 'Event Added');
        
    }
}
