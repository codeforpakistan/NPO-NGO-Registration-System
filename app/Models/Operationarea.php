<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operationarea extends Model
{
    use HasFactory;
    public $primaryKey = 'id'; 
    public $table = 'area_of_operations'; 
    protected $fillable = [
        'name', 

    ];
    public function operations()
    {
        return $this->hasMany(OperationModel::class, 'area_of_operation_id', 'id');
    }
    
}
