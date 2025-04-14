<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposedModel extends Model
{
    use HasFactory;


    public $primaryKey = 'id'; // Default primary key is 'id'
    public $table = 'proposed_finances'; // Table name
    protected $fillable = [
        'name', // Column for the name of the division

    ];

    public function financialDetails()
    {
        return $this->hasMany(Financial::class, 'prop_finan_id');
    }
}
