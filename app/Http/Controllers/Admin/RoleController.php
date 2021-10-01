<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function role(){
        return view('admin/ManageRoleView');
    }

    public function addRole(Request $request){
        date_default_timezone_set("Asia/Calcutta");
        $data = array(
            'name' => $request->input('name'),
            'position' => 2,
            'group_id' => "",
            'page_id' => "",
            'status' => $request->input('name'),
            'is_show_to_user'
        );
        dd(date('Y-m-d H:i:s'));
    }
}
