<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    public function account_name(){
        return $this->belongsTo('App\Models\Account', 'account_id');
    }
}
