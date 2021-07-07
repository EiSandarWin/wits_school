<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'm_templates-list',
           'm_templates-create',
           'm_templates-edit',
           'm_templates-delete',
           'm_template_details-list',
           'm_template_details-create',
           'm_template_details-edit',
           'm_template_details-delete',
           'm_branch-list',
           'm_branch-create',
           'm_branch-edit',
           'm_branch-delete'
        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}