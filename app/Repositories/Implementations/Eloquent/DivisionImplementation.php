<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Repositories\Contracts\DivisionRepository;
use App\Models\Division;
use App\Traits\Eloquent\Traits;

class DivisionImplementation implements  DivisionRepository
{

    use Traits;

    /**
     * @var $model
     */
    private $model;

    /**
     * SysUserImplementation constructor.
     *
     * @param App\Division $model
     */
    public function __construct(Division $model)
    {
        $this->model = $model;
    }
}
