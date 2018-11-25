<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contest';
    protected $primaryKey = 'id';
    public $timestamps = 'false';
    protected $dates = ['startTime', 'endTime'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
