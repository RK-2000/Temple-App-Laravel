<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Roles extends Model
{
    protected $table = 'tbl_master_roles';
    protected $created_at = 'created_date_time';
    const UPDATED_AT = 'updated_date_time';
    use HasFactory;

    

}   
