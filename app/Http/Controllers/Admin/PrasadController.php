<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrasadType;

class PrasadController extends Controller
{

    // Prasad Type
    // Prasad Type View
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];


            $prasad = PrasadType::where('status', '!=', '2');
            $data = array();

            if (!empty($search)) {
                $where = "( name LIKE '%" . $search . "%' )";
                $prasad->whereRaw($where);
            }



            if ($column == 1) {
                $prasad->orderBy('id', $asc);
            } elseif ($column == 2) {
                $prasad->orderBy('name', $asc);
            } elseif ($column == 3) {
                $prasad->orderBy('status', $asc);
            } elseif ($column == 4) {
                $prasad->orderBy('created_date_time', $asc);
            }

            $prasadsCount = $prasad->count();
            $prasads = $prasad->offset($start)->limit($length)->get();


            foreach ($prasads as $key => $value) {
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
                                    <li><a href="http://127.0.0.1:8000/admin/manage-prasad?prasad_id=' . $value->prasad_types_id . '">Edit</a></li>

                                    <li><a href="http://127.0.0.1:8000/admin/delete-prasad?id=' . $value->prasad_types_id . '" data-delete-link="" class="user-delete-link">Delete</a></li>
                                    </ul>
                                </div>';
                $data[] = $nestedValue;
            }
            $json_data = array(
                "recordsTotal"    => $prasadsCount,
                "recordsFiltered" => $prasadsCount,
                "data"            => $data
            );
            echo json_encode($json_data);
            exit;
        }

        if ($request->get('prasad_id')) {
            $prasad = PrasadType::where('prasad_types_id', '=', $request->get('prasad_id'))->first();
            return view('admin/ManagePrasadView')->with(compact('prasad'));
        }


        return view('admin/ManagePrasadView');
    }


    // Add Prasad View
    public function addPrasadType(Request $request)
    {
        date_default_timezone_set("Asia/Calcutta");
        $this->validate($request, [
            'name' => 'required|unique:tbl_master_prasad_types,name',
            'status' => 'required'
        ]);
        $prasad = new PrasadType;

        $prasad->created_date_time = date('Y-m-d H:i:s');
        $prasad->name  = $request->name;
        $prasad->status  = $request->status;
        if ($prasad->save()) {
            return redirect()->route('prshad_type')->with("message", "Prasad Type is added");
        } else {
            return redirect()->route('prshad_type')->with("error", "Prasad Type could not be added");
        }
    }

    //Update Prasad
    public function UpdatePrasadData(Request $request)
    {

        $this->validate($request, [
            'prasad_types_id' => "required|numeric|exists:tbl_master_prasad_types,prasad_types_id",
            'name' => 'required|unique:tbl_master_prasad_types,name,' . $request->prasad_types_id . ',prasad_types_id',
            'status' => 'required',
        ]);
        $prasad = PrasadType::where('prasad_types_id', $request->prasad_types_id)->first();
        $prasad->name = $request->name;
        $prasad->prasad_types_id = $request->prasad_types_id;
        $prasad->updated_date_time = date('Y-m-d H:i:s');
        $prasad->status = $request->status;
        if ($prasad->save()) {
            return redirect()->route('prshad_type')->with("message", "Prasad Type is updated");
        } else {
            return redirect()->route('prshad_type')->with("error", "Prasad Type could not be updated");
        }
    }


    //Delete Prasad Type
    public function DeletePrasadData(Request $req)
    {
        $prasad = PrasadType::where('prasad_types_id', $req->id)->get()->first();
        $prasad->status = 2;
        $prasad->name = $prasad->name . "_deleted";
        $prasad->save();
        return redirect()->route('prshad_type')->with("message", "Prasad is deleted");
    }
}
