<?php

namespace Modules\Category\Policies;

use Modules\Permission\Policies\MainPolicy;

class CategoryPolicy
{
    use MainPolicy;

    public static $permissionsKey = 'Categories';
}
