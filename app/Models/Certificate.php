<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $table = 'certificates';

    protected $fillable = [
        'basic_info_id',
        'issued_by',
        'certificate_number',
        'certificate_file',
        'status',
    ];
}
