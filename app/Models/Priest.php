<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priest extends Model
{
    protected $table = "tbl_priests";
    public $timestamps = false;
    use HasFactory;
}
