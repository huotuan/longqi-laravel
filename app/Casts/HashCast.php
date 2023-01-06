<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes;

class HashCast implements CastsInboundAttributes
{
    public function set($model, string $key, $value, array $attributes)
    {
        return md5($value);
    }
}
