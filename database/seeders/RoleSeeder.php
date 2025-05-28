<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'OperatorFact']);
        $role3 = Role::create(['name' => 'OperatorServi']);


        Permission::create(['name' => '.dashboard'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'park']);
        Permission::create(['name' => 'customer']);
        Permission::create(['name' => 'Upark.update']);
        Permission::create(['name' => 'park.store']);
        Permission::create(['name' => 'lead']);
        Permission::create(['name' => 'showLoad.edit']);
        Permission::create(['name' => 'Lgeneral']);
        Permission::create(['name' => 'Lgenal']);
        Permission::create(['name' => 'LCustomer.lecturaManual.store']);
        Permission::create(['name' => 'LCustomer']);
        Permission::create(['name' => 'contact']);
        Permission::create(['name' => 'new_contact']);
        Permission::create(['name' => 'VContact.edit']);
        Permission::create(['name' => 'VContact.update']);
        Permission::create(['name' => 'new_contact.store']);
        Permission::create(['name' => 'contract']);
        Permission::create(['name' => 'install']);
        Permission::create(['name' => 'install.store']);
        Permission::create(['name' => 'Alquiler.store']);
        Permission::create(['name' => 'Alquiler.create']);
        Permission::create(['name' => 'edit_alquiler.edit']);
        Permission::create(['name' => 'showAlquiler.edit']);
        Permission::create(['name' => 'edit_alquiler.update']);
        Permission::create(['name' => 'orden.edit']);
        Permission::create(['name' => 'Orden.calculo']);
        Permission::create(['name' => 'orden.create']);
        Permission::create(['name' => 'orden.generateInvoices']);
        Permission::create(['name' => 'RFLTQ']);
        Permission::create(['name' => 'LCustomer.factOdoo']);
        Permission::create(['name' => 'export.csv']);
        Permission::create(['name' => 'export_general.csv']);
        Permission::create(['name' => 'form']);
        Permission::create(['name' => 'import']);
        Permission::create(['name' => 'mantenimiento']);
        Permission::create(['name' => 'perfil.index']);
        Permission::create(['name' => 'perfil_update_info']);


        //Acceder al registro
        

    }
}
