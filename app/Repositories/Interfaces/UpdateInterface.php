<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface UpdateInterface
{
    public function update(int $id, Model|array $model);
}