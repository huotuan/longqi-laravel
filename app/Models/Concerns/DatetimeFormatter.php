<?php

namespace App\Models\Concerns;

use DateTimeInterface;

trait DatetimeFormatter
{
    public function serializeDate(DateTimeInterface $data)
    {
        return $data->format($this->getDateFormat());
    }
}
