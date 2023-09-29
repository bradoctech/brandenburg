<?php

namespace bradoctech\Brandenburg\Test;

use bradoctech\Brandenburg\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as BaseUser;

class User extends BaseUser
{
    use HasRoles;
}
