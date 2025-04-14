<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicsAim extends Model
{
    public $primaryKey = 'id'; // Default primary key is 'id'
    public $table = 'basics_aim';
    protected $fillable = ['basic_info_id', 'aim_obj_id'];
}
