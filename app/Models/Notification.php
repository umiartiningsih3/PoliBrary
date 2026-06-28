<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [

        'user_id',

        'sender_id',

        'title',

        'message',

        'type',

        'reference_id',

        'reference_type',

        'is_read'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }
}
