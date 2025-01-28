<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run() {
        // Define permissions
        $permissions = [
            // User Permissions
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',
            'user.set.permission',
            'user.remove.permission',
            'user.status',

            // Product Permissions
            'product.view',
            'product.create',
            'product.edit',
            'product.delete',
            'product.status',

            // Sale Permissions
            'sale.view',
            'sale.create',
            'sale.edit',
            'sale.delete',
            
            // Dashboard
            
            'total.user.view',
            'stock.view',
            'earning.view',
            'graph.view',
            'generate.report',
            'activity.view',

            // User Activity Permissions
            'user_activity.view',
        ];

        foreach ( $permissions as $permission ) {
            Permission::create( [ 'name' => $permission ] );
        }

        $superAdminRole = Role::create( [ 'name' => 'Super-Admin' ] );
        $superAdminRole->givePermissionTo( $permissions );

        $firstUser = User::factory()->create( [
            'name' => 'Sayed Ahmad',
            'email' => 'sayed@gmail.com',
            'password' => Hash::make( '12345678' ),
            'user_id' => 1,
            'user_type' => 'Super-Admin',
            'user_status' => 'Active',
        ] );

        $firstUser->assignRole( $superAdminRole );
    }
}
