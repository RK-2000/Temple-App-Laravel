<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{   
    protected $table = 'tbl_events';
    public $timestamps = false;
    protected $primaryKey = 'events_id';
    use HasFactory;
}
 