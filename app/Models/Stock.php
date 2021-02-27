<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;


    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function sell()
    {
        return $this->belongsTo(Sell::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
