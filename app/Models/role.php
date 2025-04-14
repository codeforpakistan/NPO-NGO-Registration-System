<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    public $primaryKey='id';
    public $table='roles';
    protected $fillable = [
        'name',
    ];
}