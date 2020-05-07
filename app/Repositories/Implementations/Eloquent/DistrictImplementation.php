<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Repositories\Contracts\DistrictRepository;
use App\Models\District;
use App\Traits\Eloquent\Traits;

class DistrictImplementation implements  DistrictRepository
{

    use Traits;

    /**
     * @var $model
     */
    private $model;

    /**
     * SysUserImplementation constructor.
     *
     * @param App\District $model
     */
    public function __construct(District $model)
    {
        $this->model = $model;
    }
}
