<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property array $config
 * @property mixed $price
 */
class Price extends Model
{
    protected $casts = [
        'config' => 'array',
        'price' => 'decimal',
    ];
}
