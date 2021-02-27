<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function from_user()
    {
        return $this->belongsTo(User::class, 'id', 'from_user_id');
    }

    public function to_user()
    {
        return $this->belongsTo(User::class, 'id', 'to_user_id');
    }
}
