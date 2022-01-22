<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository implements RepositoryInterface
{
    protected Model $model;

    public function create(Model|array $model)
    {
        // TODO: Implement create() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function find(int $id)
    {
        // TODO: Implement find() method.
    }

    public function update(int $id, Model|array $model)
    {
        // TODO: Implement update() method.
    }

}