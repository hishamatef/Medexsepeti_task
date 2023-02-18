<?php

namespace Modules\Brand\Policies;

use Modules\Permission\Policies\MainPolicy;

class BrandPolicy
{
    use MainPolicy;

    public static $permissionsKey = 'Brands';
}
