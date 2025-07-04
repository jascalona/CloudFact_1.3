<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos
        $permissions = [
            'view_records',    // Ver registros
            'create_records',   // Crear registros
            'edit_records',    // Editar registros
            'delete_records',   // Eliminar registros
            'export_records',    // Exportar registros
            'user_manager', //Ruta para el user_manager
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear rol de solo lectura
        $readOnly = Role::firstOrCreate(['name' => 'lectura']);
        $readOnly->syncPermissions(['view_records', 'export_records']);

        // Crear rol de lectura/escritura
        $readWrite = Role::firstOrCreate(['name' => 'lectura-escritura']);
        $readWrite->syncPermissions(['view_records', 'create_records','edit_records','delete_records','export_records']);



        // Opcional: Crear usuario admin inicial
        $admin = \App\Models\User::firstOrCreate([
            'email' => 'admin@grupoxven.com'
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole($readWrite);
    }
}
