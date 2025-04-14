<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialModel extends Model
{
    use HasFactory;
    protected $table = 'financials';
    protected $fillable = [
        'has_bank_account',
        'bank_id',
        'basic_info_id',
        'branch_name',
        'branch_code',
        'user_id',
        'income_expenditure_file',
        'prop_finan_id',
    ];

    public function bank()
    {
        return $this->belongsTo(BankModel::class, 'bank_id');
    }

    public function proposedFinance()
    {
        return $this->belongsTo(ProposedModel::class, 'prop_finan_id');
    }
}
