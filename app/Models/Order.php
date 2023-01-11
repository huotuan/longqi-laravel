<?php

namespace App\Models;

use App\Models\Concerns\HasUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use HasUser;
    protected $table = 'orders';
    protected $casts = [
        'snapshot' => 'json',
//                'options' => 'json',
    ];
    protected static function booted()
    {
    }

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

    public function scopeWithLastPayAt($query)
    {
        $query->addSelect(['last_pay_at' => Order::query()->select('created_at')
            ->whereColumn('user_id', 'users.id')
            ->latest()
            ->take(1),
        ])->withCasts(['last_pay_at' => 'datetime']);
    }
}
