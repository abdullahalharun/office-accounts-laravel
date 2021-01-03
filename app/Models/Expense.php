<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['cat_id', 'date', 'details', 'amount', 'remarks'];

    public function category_name(){
        return $this->belongsTo('App\Models\Expensecategory', 'cat_id');
    }
    
    public function account_name(){
        return $this->belongsTo('App\Models\Account', 'account');
    }
}
