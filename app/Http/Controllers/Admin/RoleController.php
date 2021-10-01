<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Roles;
class RoleController extends Controller
{
    public function role(Request $request){
        
    
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
                                    <li><a href="#" >Edit</a></li>
                                    <li><a href="javascript:void(0)" data-delete-link="" class="user-delete-link">Delete</a></li>
                                    </ul>
                                </div>';
                $data[] = $nestedValue;
            }
            $json_data = array(
                "recordsTotal"    => $rolesCount,
                "recordsFiltered" => $filteredValue,
                "data"            => $data
            );
            echo json_encode($json_data);
            exit;
        }


        return view('admin/ManageRoleView');
    }

    public function addRole(Request $request){
        date_default_timezone_set("Asia/Calcutta");
        
        $role = new Roles;
        $role->name = $request->input('role-name');
        $role->group_id = "";
        $role->page_id = "";
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
}
