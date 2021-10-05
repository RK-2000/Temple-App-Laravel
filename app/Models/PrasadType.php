<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrasadType extends Model
{
    protected $table = "tbl_master_prasad_types";
    protected $created_at = 'created_date_time';
    protected $primaryKey = 'prasad_types_id';
    const UPDATED_AT = 'updated_date_time';
    use HasFactory;
}
