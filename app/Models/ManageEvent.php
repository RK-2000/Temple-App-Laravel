<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ManageEvent extends Authenticatable
{
    protected $table = 'tbl_events';
    public $timestamps = false;
    protected $fillable = ['status'];
    protected $primaryKey = 'events_id';
    use HasFactory;

    public static function AddEvent($data){
        $data->save();
    }

    public static function GetEvent($data){
        $r = DB::select('select * from tbl_events where events_id = ?', [$data]);
        return $r[0] ;

    }
}
