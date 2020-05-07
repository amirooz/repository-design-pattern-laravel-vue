<?php

namespace App\Repositories\Implementations\Eloquent;

use App\Repositories\Contracts\UserRepository;
use App\User;
use App\Traits\Eloquent\Traits;

class UserImplementation implements  UserRepository
{

    use Traits;

    /**
     * @var $model
     */
    private $model;

    /**
     * SysUserImplementation constructor.
     *
     * @param App\User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
