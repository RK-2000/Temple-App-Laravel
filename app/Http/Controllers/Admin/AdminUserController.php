<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function addUser(){
        $roles = Roles::all();
        return view('admin/addUserView',['roles'=>$roles]);
    }

    public function addUserData(Request $request){
    
        $admin = new Admin; 
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|max:100',
            'email' => 'required|email|unique:tbl_admin_users',
            'mobile' => 'required',
            'password' => 'required',
            // 'role_id' => 'required',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            dd('Validation Fail');
       }else{
            $current_date_time = date('Y-m-d H:i:s');
            $admin->role_id=$request->role_id;
            $admin->user_name=$request->user_name;
            $admin->email=$request->email;
            $admin->mobile=$request->mobile;
            $password = Hash::make($request->password);
            $admin->password=$password;
            $admin->status=$request->status;
            $admin->created_date_time = $current_date_time;
            if($admin->save()){
                return redirect()->route('add_user');
            }else {
                dd('Not Added');
            }
           
       }


    }

    public function UserData(Request $request){
        if($request->ajax())
        {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];

            $role = Admin::where('status','!=','2');

        
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
             $roles = $role->offset($start)->limit($length)->get();  
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
                // $nestedValue[3] = $value->created_date_time;
                $nestedValue[3] = '<div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    Action
                                    <span class="caret">
                                    </span>
                                    </button>
                                    <ul class="dropdown-menu text-center">
                                    <li><a href="http://127.0.0.1:8000/admin/edit-user?id='.$value->admin_users_id.'">Edit</a></li>
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

    public function EditUser(Request $data){
        $id = $data->id;
        $roles = Roles::all();
        $datas = Admin::GetData($id);
        $data = $datas[0];
        $data->id = $id;
        return view('admin/EditUserView',['data'=>$data,'roles' => $roles]);
    }
    public function EditData(Request $data){

        $admin = new Admin; 
        $validator = Validator::make($data->all(), [
            'user_name' => 'required|max:100',
            'email' => 'required',
            'mobile' => 'required',
            'status' => 'required'
        ]);
        if($validator->fails()) {
                dd('Validation Fail');
        }else{
            $update_date_time = date('Y-m-d H:i:s');
            $admin->role_id=$data->role_id;
            $admin->user_name=$data->user_name;
            $admin->email=$data->email;
            $admin->mobile=$data->mobile;
            $admin->status=$data->status;
            $admin->id=$data->id;
            $data = Admin::EditData($admin);
            if($data){
                dd('success');
            }else{
                dd('fail');
            }
           
       }

        
    }   
}
