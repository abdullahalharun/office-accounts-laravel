<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'account_id');
    }
    
    // public function credit_balance()
    // {
    //     $balance = Statement::where('account', $this->id)->sum('credit');
    //     return $balance;
    // }
}
