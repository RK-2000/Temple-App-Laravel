<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // view for categories
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $start = $request->start;
            $length = $request->length;
            $column = $request->order[0]['column'];
            $asc = $request->order[0]['dir'];
            $search = $request->search['value'];


            $event = Category::where('status', '!=', '2');
            $data = array();

            if (!empty($search)) {
                $where = "( name LIKE '%" . $search . "%' )";
                $event->whereRaw($where);
            }


            if ($column == 0) {
                $event->orderBy('id', $asc);
            } elseif ($column == 1) {
                $event->orderBy('name', $asc);
            } elseif ($column == 2) {
                $event->orderBy('status', $asc);
            } elseif ($column == 3) {
                $event->orderBy('created_date_time', $asc);
            }

            $eventsCount = $event->count();
            $events = $event->offset($start)->limit($length)->get();


            foreach ($events as $key => $value) {
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
                                    <li><a href="http://127.0.0.1:8000/admin/category?id=' . $value->id . '">Edit</a></li>

                                    <li><a href="http://127.0.0.1:8000/admin/delete-category?id=' . $value->id . '" data-delete-link="" class="user-delete-link">Delete</a></li>
                                    </ul>
                                </div>';
                $data[] = $nestedValue;
            }
            $json_data = array(
                "recordsTotal"    => $eventsCount,
                "recordsFiltered" => $eventsCount,
                "data"            => $data
            );
            echo json_encode($json_data);
            exit;
        }

        if ($request->get('id')) {
            $category = Category::where('id', '=', $request->get('id'))->first();
            return view('admin/ManageCategoryView')->with(compact('category'));
        }

        return view('admin/ManageCategoryView');
    }

    // Add Category
    public function addCategory(Request $request)
    {

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
        
        return redirect()->route('category')->with('message', 'Category Added');
        
    }

    // Update Category
    public function updateCategory(Request $request)
    {
        $this->validate($request, [
            'id' => "required|numeric|exists:tbl_master_category,id",
            'name' => 'required|unique:tbl_master_category,name,' . $request->id . ',id',
            'status' => 'required',
        ]);
        $category = Category::where('id', $request->id)->first();
        $category->name = $request->name;
        $category->updated_date_time = date('Y-m-d H:i:s');
        $category->status = $request->status;
        if ($category->save()) {
            return redirect()->route('category')->with("message", "Category is updated");
        } else {
            return redirect()->route('category')->with("error", "Category could not be updated");
        }
    }

    //Delete Category
    public function deleteCategory(Request $request){
        
        $category = Category::where('id', $request->id)->get()->first();
        $category->status = 2;
        $category->name = $category->name . "_del";
        $category->save();
        return redirect()->route('category')->with("message", "Category is deleted");
    }

}
