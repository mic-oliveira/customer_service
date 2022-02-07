<?php

namespace App\Http\Controllers\API;

use App\Actions\Person\CreatePerson;
use App\Actions\Person\FindPerson;
use App\Actions\Person\PaginatePeople;
use App\Actions\Person\UpdatePerson;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\PersonResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Spatie\RouteAttributes\Attributes\Resource;


#[Resource(resource: 'api/v1/people', apiResource: true, names: [])]
class PersonController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PersonResource::collection(PaginatePeople::run());
    }

    public function store(Request $request): PersonResource
    {
        return PersonResource::make(CreatePerson::run($request->all()));
    }


    public function show($id): PersonResource
    {
        return PersonResource::make(FindPerson::run($id));
    }

    public function update(Request $request, $id): PersonResource
    {
        return PersonResource::make(UpdatePerson::run($request->all(), $id));
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
