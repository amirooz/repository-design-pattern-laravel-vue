<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Repositories\Contracts\MahanagarRepository;
use App\Models\Mahanagar;
use App\Traits\Eloquent\Traits;

class MahanagarImplementation implements  MahanagarRepository
{

    use Traits;

    /**
     * @var $model
     */
    private $model;

    /**
     * SysUserImplementation constructor.
     *
     * @param App\Mahanagar $model
     */
    public function __construct(Mahanagar $model)
    {
        $this->model = $model;
    }
}
