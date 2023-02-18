<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Log;
use Modules\Permission\Http\Services\RoleService;
use Modules\Permission\Http\Services\PermissionService;
use Spatie\Permission\Models\Permission;
use Modules\Permission\Http\Services\RolePermissionService;

class AddPermissionRolesRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            $this->seedPermissions();
            $this->seedRoles();
        } catch (\Exception $e) {
            Log::channel('daily')->error($e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function seedPermissions()
    {
        $modules = ['Brands', 'Categories', 'Products'];
        $permissionService = new PermissionService();
        $permissionService->createBulk($modules);
    }

    private function seedRoles()
    {
        $allPermissions = Permission::get();
        $roleService = new RoleService($allPermissions);
        $roleService->createBulk($this->getRolesPermissionsArray($allPermissions));
    }

    private function getRolesPermissionsArray($allPermissions)
    {
        $rolePermissionService = new RolePermissionService($allPermissions);
        $roles = ['Admin'];
        return $rolePermissionService->getRolesPermissions($roles);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
