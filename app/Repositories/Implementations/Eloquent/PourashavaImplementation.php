<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Repositories\Contracts\PourashavaRepository;
use App\Models\Pourashava;
use App\Traits\Eloquent\Traits;

class PourashavaImplementation implements  PourashavaRepository
{

    use Traits;

    /**
     * @var $model
     */
    private $model;

    /**
     * SysUserImplementation constructor.
     *
     * @param App\Pourashava $model
     */
    public function __construct(Pourashava $model)
    {
        $this->model = $model;
    }
}
