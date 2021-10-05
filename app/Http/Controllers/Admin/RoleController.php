<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Roles;
class RoleController extends Controller
{


    public function manageRole(Request $request){
        
    
        if($request->ajax())
        {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];

            $role = DB::table('tbl_master_roles');
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
                if($value->is_show_to_user == 0 or $value->status == 2){
                    $start--;
                    $rolesCount--;
                    continue;
                }
                $filteredValue ++;
                $nestedValue = array();
                $nestedValue[0] = $start+$key+1; 
                $nestedValue[1] = $value->name;
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


        return view('admin/ManageRoleView');
    }

    public function addRole(){
        return view('admin/addRole');
    }

    public function addRoleData(Request $request){
        
        date_default_timezone_set("Asia/Calcutta");
        
        

        $groups = "";
        if(!empty($request->input('groups'))){
            foreach($request->input('groups') as $group){
                $groups .= $group.",";  
            }
        }
        

        $pages = "";
        if(!empty($request->input('pages'))){
            foreach($request->input('pages') as $list){
                $pages .= $list.",";  
            }
        }
    
        $role = new Roles;
        $role->name = $request->input('role-name');
        $role->group_id = $groups;
        $role->page_id = $pages;
        $role->status = (int)($request->input('role-status'));
        $role->is_show_to_user = 1;
        $role->created_date_time = date('Y-m-d H:i:s');
        if($role->save())
        {
            return redirect()->route('manage_role');
        }
        else{
            dd($role);
        }

    }

    public function UpdateRole(Request $req){
        $role = Roles::where('id',$req->id)->first();
        if(!$role){
            dd("Invalid User Id");   
        }
        $page_ids = explode(",",$role->page_id);
        $group_ids = explode(",",$role->group_id);
        if(!empty($page_ids)){
            array_pop($page_ids);
        }
        if(!empty($group_ids)){
            array_pop($group_ids);
        }
        $name = $role->name;
        $status = $role->status;
        $id = $role->id;
        return view('admin/UpdateRole')->with(compact('page_ids','group_ids','name','status','id'));
    }

    public function UpdateRoleData(Request $request){
        $id = (int)$request->role_id;
        $role = Roles::where('id','=',$id)->first();
        

        $groups = "";
        if(!empty($request->input('groups'))){
            foreach($request->input('groups') as $group){
                $groups .= $group.",";  
            }
        }
        

        $pages = "";
        if(!empty($request->input('pages'))){
            foreach($request->input('pages') as $list){
                $pages .= $list.",";  
            }
        }
        $role->name = $request->input('role-name');
        $role->group_id = $groups;
        $role->page_id = $pages;
        $role->status = (int)($request->input('role-status'));
        $role->is_show_to_user = 1;
        $role->updated_date_time = date('Y-m-d H:i:s');
        if($role->save())
        {
            return redirect()->route('manage_role');
        }
        else{
            dd($role);
        }

    }

}
