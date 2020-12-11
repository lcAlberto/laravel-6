<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

use App\Support\PermissionsHelper;

class PermissionTableSeeder extends Seeder
{
    private function getPermissions()
    {
        return [
            'users' => ['index', 'create', 'edit', 'destroy'],
            'base test',
        ];
    }

    public function run()
    {
        $permissions = $this->getPermissions();
        $permissions = PermissionsHelper::getFlattenPermissions($permissions);
        foreach ($permissions as $permission) {
            $model = Permission::firstOrNew(['name' => $permission]);
            $model->save();
        }
    }
}
