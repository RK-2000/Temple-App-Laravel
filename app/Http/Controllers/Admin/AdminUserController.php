<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function addUser(){
        return view('admin/addUserView');
    }

    public function UserData(Request $request){
        if($request->ajax())
        {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];

            $role = Admin::all();

        
            $data = array();
            
            if(!empty($search)){
                $where = "( name LIKE '%".$search."%' )";
                $role->whereRaw($where);
            }

            if ($column == 1) {
                $role->orderBy('id',$asc);
             } elseif($column == 2) {
                $role->orderBy('name',$asc);
             } elseif($column == 3) {
                $role->orderBy('status',$asc);
             } elseif($column == 4) {
                 $role->orderBy('created_date_time',$asc);
             } 

             $rolesCount = $role->count();
             $roles = $role->offsetGet($start)->limit($length)->get();  
             $filteredValue = 0;
             
            foreach($roles as $key => $value){
                
                $nestedValue = array();
                $nestedValue[0] = $start+$key+1; 
                $nestedValue[1] = $value->email;
                if($value->status == 1){
                    $nestedValue[2] = 'Active';
                }
                else{
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
                                    <li><a href="http://127.0.0.1:8000/admin/update-role?id='.$value->id.'">Edit</a></li>
                                    <li><a href="javascript:void(0)" data-delete-link="" class="user-delete-link">Delete</a></li>
                                    </ul>
                                </div>';
                $data[] = $nestedValue;
            }
            $json_data = array(
                "recordsTotal"    => $rolesCount,
                "recordsFiltered" => $rolesCount,
                "data"            => $data
            );
            echo json_encode($json_data);
            exit;
        }


        return view('admin/UsersView');

    }
}
