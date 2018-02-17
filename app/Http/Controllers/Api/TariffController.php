<?php

namespace App\Http\Controllers\Api;

use App\Model\Tariff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response()->json(['Ok']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Tariff  $tariff
     * @return \Illuminate\Http\Response
     */
    public function show(Tariff $tariff)
    {
        return Response()->json(['Ok']);
    }
}
