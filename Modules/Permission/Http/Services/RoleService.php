<?php

namespace Modules\Permission\Http\Services;

use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RoleService
{
    private $allPermissions;

    public function __construct($permessions)
    {
        $this->allPermissions = $permessions;;
    }

    public function createBulk($roles)
    {
        $this->createAdminRole();
        foreach ($roles as $role=>$rolePermissions){
            $this->create($role,$rolePermissions);
        }
    }

    private function createAdminRole()
    {
        $this->create("Admin",$this->allPermissions);
    }

    private function create($role,$permissions)
    {
        $role_item =  Role::firstOrCreate([
            'slug'=> Str::slug($role, "-"),
            'name' => $role
        ]);
        $role_item->syncPermissions($permissions);
    }

}
