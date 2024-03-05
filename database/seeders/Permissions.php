<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_permissions = [
            'list-user',
            'create-user',
            'update-user',
            'delete-user',

            'list-role',
            'create-role',
            'update-role',
            'delete-role',

            'list-product',
            'create-product',
            'update-product',
            'delete-product',

            'list-category',
            'create-category',
            'update-category',
            'delete-category',

            'list-customer',
            'create-customer',
            'update-customer',
            'delete-customer',

            'list-posts',
            'create-posts',
            'update-posts',
            'delete-posts',

            'list-banner',
            'create-banner',
            'update-banner',
            'delete-banner',

            'list-order',
            'status-order',
            'detail-order',

            'list-contact',
            'create-contact',
            'update-contact',
            'delete-contact',
            
            'dashboard',
        ];
        foreach ($data_permissions as $value) {
            DB::table('permissions')->insert([
                'name' => $value,
                'guard_name' => 'web'
            ]);
        }
    }
}
