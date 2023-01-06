<?php

namespace App\Models\Concerns;

use App\Models\User;

trait HasUser
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
