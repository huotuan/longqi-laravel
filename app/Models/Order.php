<?php

namespace App\Models;

use App\Casts\JsonCast;
use App\Models\Concerns\DatetimeFormatter;
use App\Models\Concerns\HasUser;
use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use HasUser;
    use SoftDeletes;
    use DatetimeFormatter;
    protected $touches = [];
    protected $guarded = [];
    protected $casts = [
        'options' => JsonCast::class,
        'snapshot' => 'json',
    ];

//    protected static function booted()
//    {
//        static::addGlobalScope(new StoreScope());
//        static::addGlobalScope('complete', function (Builder $builder) {
//            return $builder->where('status', 2);
//        });
//    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 0);
    }

    public function scopeOfUser(Builder $query, $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    public function options(): Attribute
    {
        return Attribute::make(
            get:fn ($value) => json_decode($value, true),
            set:fn ($value) => json_encode($value),
        );
    }

    public function totalFormat(): Attribute
    {
        return Attribute::make(
            get:fn () => $this->getOriginal('total') == 0 ? 0.00 : $this->getOriginal('total') * 0.01,
        );
    }
}
