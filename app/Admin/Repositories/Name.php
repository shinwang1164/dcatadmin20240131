<?php

namespace App\Admin\Repositories;

use App\Models\Name as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Name extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
