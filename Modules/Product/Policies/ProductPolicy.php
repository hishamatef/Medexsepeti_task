<?php

namespace Modules\Product\Policies;

use Modules\Permission\Policies\MainPolicy;

class ProductPolicy
{
    use MainPolicy;

    public static $permissionsKey = 'Products';
}
