<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [   
                'role_id' => 1,
                'name'    => 'MD. Admin',
                'username'    => 'admin', 
                'email'    => 'adminblog@gmail.com',
                'password'    => bcrypt('rootadmin'),

            ]);


            DB::table('users')->insert(
                [   
                    'role_id' => 2,
                    'name'    => 'MD. Author',
                    'username'    => 'author', 
                    'email'    => 'authorblog@gmail.com',
                    'password'    => bcrypt('rootauthor'),
    
                ]);
    }
}
