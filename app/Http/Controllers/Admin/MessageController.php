<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Priest;

class MessageController extends Controller
{
    public function MessageData(Request $request){


        if ($request->ajax()) {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];
            $priest = Priest::where('status','!=','2');
            $data = array();
            if (!empty($search)) {
                $where = "( name LIKE '%" . $search . "%' )";
                $priest->whereRaw($where);
            }
            if ($column == 0) {
                $priest->orderBy('priest_id', $asc);
            } elseif ($column == 1) {
                $priest->orderBy('name', $asc);
            } elseif ($column == 2) {
                $priest->orderBy('email', $asc);
            }

            $priestCount = $priest->count();
            $priests = $priest->offset($start)->limit($length)->get();
            $filteredValue = 0;

            foreach ($priests as $key => $value) {
                $nestedValue = array();
                $nestedValue[0] = $start + $key + 1;
                $nestedValue[1] = $value->name;
                $nestedValue[2] = $value->email;
                $nestedValue[3] = '<input type="checkbox" class="mx-1" id="check" name="priest_id[]" value='.$value->priest_id.'>';
                
                $data[] = $nestedValue;
            }
            $json_data = array(
                "recordsTotal"    => $priestCount,
                "recordsFiltered" => $priestCount,
                "data"            => $data
            );
            echo json_encode($json_data);
            exit;
        }


        return view('admin/EmailMessageView');
    }

    public function SendEmail(Request $request){
        dd($request);
    }


}
