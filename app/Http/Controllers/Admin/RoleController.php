<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Roles;
use App\Models\Admin;


class RoleController extends Controller
{

    // To view a role
    public function manageRole(Request $request)
    {
        if ($request->ajax()) {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];
            $role = Roles::where('status', '!=', 2);
            $data = array();

            if (!empty($search)) {
                $where = "( name LIKE '%" . $search . "%' )";
                $role->whereRaw($where);
            }

            if ($column == 1) {
                $role->orderBy('id', $asc);
            } elseif ($column == 2) {
                $role->orderBy('name', $asc);
            } elseif ($column == 3) {
                $role->orderBy('status', $asc);
            } elseif ($column == 4) {
                $role->orderBy('created_date_time', $asc);
            }
            $rolesCount = $role->count();
            $roles = $role->offset($start)->limit($length)->get();
            $filteredValue = 0;
            foreach ($roles as $key => $value) {
                if ($value->is_show_to_user == 0 or $value->status == 2) {
                    $start--;
                    $rolesCount--;
                    continue;
                }
                $filteredValue++;
                $nestedValue = array();
                $nestedValue[0] = $start + $key + 1;
                $nestedValue[1] = $value->name;
                if ($value->status == 1) {
                    $nestedValue[2] = 'Active';
                } else {
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
                                    <li><a href="http://127.0.0.1:8000/admin/update-role?id=' . $value->id . '">Edit</a></li>

                                    <li><a href="http://127.0.0.1:8000/admin/delete-role?id=' . $value->id . '" data-delete-link="" class="user-delete-link">Delete</a></li>
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


    // To add a role
    public function addRoleData(Request $request)
    {

        date_default_timezone_set("Asia/Calcutta");
        $this->validate($request, [
            "role-name" => "required|unique:tbl_master_roles,name",
        ]);


        $groups = "";
        if (!empty($request->input('groups'))) {
            foreach ($request->input('groups') as $group) {
                $groups .= $group . ",";
            }
        }

        $pages = "";
        if (!empty($request->input('pages'))) {
            foreach ($request->input('pages') as $list) {
                $pages .= $list . ",";
            }
        }
        $groups = substr($groups, 0, -1);
        $pages = substr($pages, 0, -1);

        $role = new Roles;
        $role->name = $request->input('role-name');
        $role->group_id = $groups;
        $role->page_id = $pages;
        $role->status = (int)($request->input('role-status'));
        $role->is_show_to_user = 1;
        $role->created_date_time = date('Y-m-d H:i:s');
        if ($role->save()) {
            return redirect()->route('manage_role')->with("message", "Role is added");
        } else {
            return redirect()->route('manage_role')->with("error", "Role was not Added");
        }
    }


    // To view update role
    public function UpdateRole(Request $req)
    {
        $role = Roles::where('id', $req->id)->first();
        if (!$role) {
            dd("Invalid User Id");
        }


        if (!empty($role->page_id)) {
            $page_ids = explode(",", $role->page_id);
        }


        if (!empty($role->group_id)) {
            $group_ids = explode(",", $role->group_id);
        }
        $name = $role->name;
        $status = $role->status;
        $id = $role->id;
        return view('admin/UpdateRole')->with(compact('page_ids', 'group_ids', 'name', 'status', 'id'));
    }


    // To Update a Role
    public function UpdateRoleData(Request $request)
    {
        $id = (int)$request->role_id;
        $role = Roles::where('id', '=', $id)->first();


        $groups = "";
        if (!empty($request->input('groups'))) {
            foreach ($request->input('groups') as $group) {
                $groups .= $group . ",";
            }
        }

        $pages = "";
        if (!empty($request->input('pages'))) {
            foreach ($request->input('pages') as $list) {
                $pages .= $list . ",";
            }
        }

        $groups = substr($groups, 0, -1);
        $pages = substr($pages, 0, -1);

        $role->name = $request->input('role-name');
        $role->group_id = $groups;
        $role->page_id = $pages;
        $role->status = (int)($request->input('role-status'));
        $role->is_show_to_user = 1;
        $role->updated_date_time = date('Y-m-d H:i:s');
        if ($role->save()) {
            return redirect()->route('manage_role')->with("message", "Role is updated");
        } else {
            return redirect()->route('manage_role')->with("error", "Role was not updated");
        }
    }


    // To delete a role
    public function DeleteRoleData(Request $req)
    {
        $role = Roles::where('id', $req->id)->get()->first();
        $role->status = 2;
        $role->name = $role->name . "_deleted";
        $role->save();

        //Delete All users related to this role

        Admin::where('role_id', $req->id)->update(['status' => 2]);

        return redirect()->route('manage_role')->with("error", "Role is deleted");
    }
}
