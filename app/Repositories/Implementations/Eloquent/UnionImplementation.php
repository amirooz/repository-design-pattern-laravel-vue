<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Repositories\Contracts\UnionRepository;
use App\Models\Union;
use App\Traits\Eloquent\Traits;

class UnionImplementation implements  UnionRepository
{

    use Traits;

    /**
     * @var $model
     */
    private $model;

    /**
     * SysUserImplementation constructor.
     *
     * @param App\Union $model
     */
    public function __construct(Union $model)
    {
        $this->model = $model;
    }
}
