<?php

namespace Modules\Permission\Http\Services;

use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    private static $moduleMainPermissions = ['List ','Create ','Update ','Delete ','Show '];
    public function createBulk($modules)
    {
        $permissions_data= [];
        foreach ($modules as $module) {
            foreach (PermissionService::$moduleMainPermissions as $permission){
                $permissions_data[] = $this->preparePermissionsData($permission,$module);
            }
        }
        $this->create($permissions_data);
    }

    private function preparePermissionsData($permission,$module)
    {
        return [
            'slug' => Str::slug($permission.$module, "-"),
            'name' => $permission.$module,
            'guard_name' => 'web'
        ];
    }

    private function create($permissions)
    {
        Permission::insert($permissions);
    }



}
