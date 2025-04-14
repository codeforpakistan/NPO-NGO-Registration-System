<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
    use HasFactory;


    public $primaryKey = 'id'; // Default primary key is 'id'
    public $table = 'banks'; // Table name
    protected $fillable = [
        'name', // Column for the name of the division

    ];

    public function financialDetails()
    {
        return $this->hasMany(FinancialModel::class, 'bank_id');
    }
}
