<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions if not exist
        if (!Permission::where('name', 'manajemen users')->exists()) {
            Permission::create(['name' => 'manajemen users', 'guard_name' => 'web']);
        }
        if (!Permission::where('name', 'manajemen roles')->exists()) {
            Permission::create(['name' => 'manajemen roles', 'guard_name' => 'web']);
        }
        if (!Permission::where('name', 'manajemen produk')->exists()) {
            Permission::create(['name' => 'manajemen produk', 'guard_name' => 'web']);
        }
        if (!Permission::where('name', 'manajemen kategori')->exists()) {
            Permission::create(['name' => 'manajemen kategori', 'guard_name' => 'web']);
        }
        if (!Permission::where('name', 'manajemen lumbungpadi')->exists()) {
            Permission::create(['name' => 'manajemen lumbungpadi', 'guard_name' => 'web']);
        }
        if (!Permission::where('name', 'manajemen sewatratak')->exists()) {
            Permission::create(['name' => 'manajemen sewatratak', 'guard_name' => 'web']);
        }
        if (!Permission::where('name', 'manajemen airbersih')->exists()) {
            Permission::create(['name' => 'manajemen airbersih', 'guard_name' => 'web']);
        }
 


        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $kasirRole = Role::firstOrCreate(['name' => 'kasir', 'guard_name' => 'web']);

        // assign permissions to roles
        $adminRole->givePermissionTo(Permission::all());
        $kasirRole->givePermissionTo(['manajemen produk', 'manajemen kategori']);
    }
}
