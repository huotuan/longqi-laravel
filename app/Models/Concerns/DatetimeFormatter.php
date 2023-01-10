<?php

namespace App\Models\Concerns;

use DateTimeInterface;

trait DatetimeFormatter
{
    public function serializeDate(DateTimeInterface $data): string
    {
        return $data->format($this->getDateFormat());
    }
}
