<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MenuList extends Model
{
    protected $table = 'tbl_menu_list';
    use HasFactory;

    public static function getList(){
        $data = DB::select('select * from tbl_menu_list');
        return $data;
    }
}
