<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Event extends Authenticatable
{   protected $table = "tbl_master_event_types";
    public $timestamps = false;
    use HasFactory;

    public static function AddEventType($data){
        $data->save();
    }
}