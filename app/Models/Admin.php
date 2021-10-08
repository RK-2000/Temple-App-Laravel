<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    protected $table = "tbl_admin_users";
    protected $primaryKey = 'admin_users_id';
    public $timestamps = false;
    use HasApiTokens, HasFactory, Notifiable;

    public static function Adddata(Request $data)
    {
        $data->save();
    }
    public static function GetData($id)
    {
        $data  = DB::select('select * from tbl_admin_users where  admin_users_id = ?', [$id]);
        return $data;
    }
}
