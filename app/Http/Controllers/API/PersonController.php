<?php

namespace App\Http\Controllers\API;

use App\Actions\Person\CreatePersonAction;
use App\Actions\Person\FindPerson;
use App\Actions\Person\ListPeople;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\PersonResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Resource;


// #[Group(prefix: 'api/v1/people', as: 'people.')]
#[Resource(resource: 'api/v1/people', apiResource: true, names: [])]
#[Middleware()]
class PersonController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PersonResource::collection(ListPeople::run());
    }

    public function store(Request $request): PersonResource
    {
        return PersonResource::make(CreatePersonAction::run($request->all()));
    }


    public function show($id): PersonResource
    {
        return PersonResource::make(FindPerson::run($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
