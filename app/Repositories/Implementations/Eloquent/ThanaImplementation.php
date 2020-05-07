<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Repositories\Contracts\ThanaRepository;
use App\Models\Thana;
use App\Traits\Eloquent\Traits;

class ThanaImplementation implements  ThanaRepository
{

    use Traits;

    /**
     * @var $model
     */
    private $model;

    /**
     * SysUserImplementation constructor.
     *
     * @param App\Thana $model
     */
    public function __construct(Thana $model)
    {
        $this->model = $model;
    }
}
