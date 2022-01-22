<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface CreateInterface
{
    public function create(Model|array $model);
}