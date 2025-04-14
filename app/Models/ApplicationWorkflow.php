<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationWorkflow extends Model
{
    use HasFactory;
    protected $table = 'application_workflows';

    protected $fillable = [
        'basic_info_id',
        'from_user_id',
        'to_user_id',
        'action',
        'comments',
        'attachment',
    ];
}
