<?php

namespace App\Repositories\Criteria\User;

use App\Repositories\Criteria\Criteria;
use App\Repositories\Repository;

class UserRole extends Criteria
{
    private $role = null;

    public function __construct($role)
    {
        $this->role = $role;
    }

    public function apply($queryBuilder, Repository $repository)
    {
        return $queryBuilder->whereHas("roles", function ($q) {
            $q->where("name", $this->role);
        });
    }
}