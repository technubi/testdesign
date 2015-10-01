<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();

        $adminRole = Role::whereName('administrator')->first();
        $userRole = Role::whereName('user')->first();
        $memberRole = Role::whereName('member')->first();

        $user = User::create(array(
            'name'    => 'John',
            'email'         => 'j.doe@codingo.me',
            'password'      => Hash::make('password')
        ));
        $user->assignRole($adminRole);

        $user = User::create(array(
            'name'    => 'Jane',
            'email'         => 'jane.doe@codingo.me',
            'password'      => Hash::make('janesPassword')
        ));
        $user->assignRole($userRole);

        $user = User::create(array(
            'name'     => 'Does',
            'email'         => 'jane.doe@codingos.me',
            'password'      => Hash::make('janesPassworde')
        ));
        $user->assignRole($memberRole);
    }
}