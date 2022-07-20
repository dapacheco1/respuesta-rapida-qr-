<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DisappearedResource;
use App\Models\Disappeared;
use Illuminate\Http\Request;

class DisappearedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disappeared  $disappeared
     * @return \Illuminate\Http\Response
     */
    public function show(Disappeared $disappeared)
    {
        return new DisappearedResource($disappeared);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disappeared  $disappeared
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disappeared $disappeared)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disappeared  $disappeared
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disappeared $disappeared)
    {
        //
    }
}
