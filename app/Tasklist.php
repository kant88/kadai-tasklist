<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    protected $fillable = ['stat','content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
