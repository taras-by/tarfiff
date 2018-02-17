<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $casts = [
        'config' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeFilter($query, $filter)
    {
        $filter = @json_decode($filter);

        if (isset($filter->ids)) {
            $query->whereIn('id', $filter->ids);
        }

        if (isset($filter->keys)) {
            $query->whereIn('key', $filter->keys);
        }

        return $query;
    }
}
