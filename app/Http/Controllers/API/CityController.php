<?php

namespace App\Http\Controllers\API;

use App\Actions\City\ListCities;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\CityResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Resource;

#[Resource(resource: 'api/v1/cities', apiResource: true, names: [])]
#[Middleware()]
class CityController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return CityResource::collection(ListCities::run());
    }


    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
