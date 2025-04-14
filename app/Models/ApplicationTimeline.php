<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationTimeline extends Model
{
    use HasFactory;
    protected $table = 'application_timelines';

    protected $fillable = [
        'basic_info_id',
        'user_id',
        'stage',
        'status',
    ];
}
