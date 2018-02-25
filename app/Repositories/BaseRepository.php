<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

class BaseRepository
{
    public function query(): Builder
    {
        return call_user_func(static::MODEL.'::query');
    }
}