<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInformation extends Model
{
    protected $fillable = ['user_id','name', 'contact', 'address', 'constitution_file','status','reject','district_id'];

    // public function aims()
    // {
    //     return $this->belongsToMany(AimObjective::class, 'basics_aim', 'basic_info_id', 'aim_obj_id');
    // }


    public function aims()
    {
        return $this->belongsToMany(
            AimObjective::class,
            'basics_aim',
            'basic_info_id',
            'aim_obj_id'
        );
    }
}
