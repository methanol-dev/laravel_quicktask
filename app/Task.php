<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    const IS_DONE = 1;
    const IS_NOT_DONE = 0;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
