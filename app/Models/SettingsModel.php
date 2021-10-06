<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SettingsModel extends Authenticatable
{   
    protected $table = 'tbl_settings';
    public $timestamps = false;
    use HasFactory;

    public static function EditSettings(Request $data){
        $data->save();
    }
}
