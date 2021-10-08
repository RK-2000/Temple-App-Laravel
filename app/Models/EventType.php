<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $table = "tbl_master_event_types";
    public $timestamps = false;

    use HasFactory;
}
