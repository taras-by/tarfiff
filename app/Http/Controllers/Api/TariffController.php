<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TariffRequest;
use App\Http\Resources\TariffResource;
use App\Models\Tariff;
use App\Http\Controllers\Controller;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param TariffRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(TariffRequest $request)
    {
        $tariffs = Tariff::query()
            ->active()
            ->filter($request->get('filter'))
            ->get();

        return TariffResource::collection($tariffs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tariff $tariff
     * @return TariffResource|null
     */
    public function show(Tariff $tariff)
    {
        if (!$tariff->is_active) {
            abort(404, 'Tariff not found');
        }

        return new TariffResource($tariff);
    }
}
