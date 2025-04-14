<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    use HasFactory;


    public $primaryKey = 'id'; // Default primary key is 'id'
    public $table = 'users'; // Table name
    protected $fillable = [
        'name', // Column for the name of the division
        'email', 
        'phone_number', 
        'password', 
        'role_id',
        'district_id',
    ];
    public function role()
    {
        return $this->belongsTo(role::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}