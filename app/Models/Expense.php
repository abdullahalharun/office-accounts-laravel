<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'date', 'details', 'amount'];

    public function category_name(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    
    public function account_name(){
        return $this->belongsTo('App\Models\Account', 'account_id');
    }
}
