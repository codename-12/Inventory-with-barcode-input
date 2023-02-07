<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'DFprogress-list',
            'DFprogress-create',
            'DFprogress-edit',
            'DFprogress-delete',
            'DFregkain_polos-list',
            'DFregkain_polos-create',
            'DFregkain_polos-edit',
            'DFregkain_polos-delete',
            'KOP-list',
            'KOP-create',
            'KOP-edit',
            'KOP-delete',
            'customerkain-list',
            'customerkain-create',
            'customerkain-edit',
            'customerkain-delete',
            'GJstock-list',
            'GJstock-create',
            'GJstock-edit',
            'GJstock-delete',
            'rajut-list',
            'rajut-create',
            'rajut-edit',
            'rajut-delete',
            'invoicebenang-list',
            'invoicebenang-create',
            'invoicebenang-edit',
            'invoicebenang-delete',
            'supbenang-list',
            'supbenang-create',
            'supbenang-edit',
            'supbenang-delete',
            'BPBbenang-list',
            'BPBbenang-create',
            'BPBbenang-edit',
            'BPBbenang-delete',
            'gudangjadi-list',
            'gudangjadi-create',
            'gudangjadi-edit',
            'gudangjadi-delete',
            'benang-list',
            'benang-create',
            'benang-edit',
            'benang-delete',
            'obenang-list',
            'obenang-create',
            'obenang-edit',
            'obenang-delete',
            'masterbenang-list',
            'masterbenang-create',
            'masterbenang-edit',
            'masterbenang-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
