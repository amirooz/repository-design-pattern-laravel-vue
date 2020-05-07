<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Repositories\Contracts\UpazillaRepository;
use App\Models\Upazilla;
use App\Traits\Eloquent\Traits;

class UpazillaImplementation implements  UpazillaRepository
{

    use Traits;

    /**
     * @var $model
     */
    private $model;

    /**
     * SysUserImplementation constructor.
     *
     * @param App\Upazilla $model
     */
    public function __construct(Upazilla $model)
    {
        $this->model = $model;
    }
}
