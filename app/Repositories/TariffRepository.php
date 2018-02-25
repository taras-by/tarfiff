<?php

namespace App\Repositories;

use App\Models\Tariff;
use Illuminate\Database\Eloquent\Collection;

class TariffRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Tariff::class;

    /**
     * @param $filter
     * @return Collection
     */
    public function getByFilter($filter): Collection
    {
        $query = $this->query()
            ->where('is_active', true);

        $filter = json_decode($filter);

        if (isset($filter->ids)) {
            $query->whereIn('id', $filter->ids);
        }

        if (isset($filter->keys)) {
            $query->whereIn('key', $filter->keys);
        }

        return $query->get();
    }
}