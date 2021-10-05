<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Groups extends Model
{
    protected $table = 'tbl_menu_group';
    use HasFactory;
    
    public static function getGroups(){
        $data = DB::select('select * from tbl_menu_group');
        return $data;
    }
}
