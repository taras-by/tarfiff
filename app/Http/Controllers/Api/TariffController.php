<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TariffResource;
use App\Model\Tariff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $tariffs = Tariff::all();

        return TariffResource::collection($tariffs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Tariff $tariff
     * @return TariffResource
     */
    public function show(Tariff $tariff)
    {
        return new TariffResource($tariff);
    }
}
