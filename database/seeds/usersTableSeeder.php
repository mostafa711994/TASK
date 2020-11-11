<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([

                'name'=> 'admin',
                'email' => 'a@a.a',
                'password' => \Illuminate\Support\Facades\Hash::make('password')
        ]);
        \App\User::create([

            'name'=> 'admin2',
            'email' => 'a2@a.a',
            'password' => \Illuminate\Support\Facades\Hash::make('password')
        ]);
        \App\User::create([

        'name'=> 'admin3',
        'email' => 'a3@a.a',
        'password' => \Illuminate\Support\Facades\Hash::make('password')
    ]);
        \App\User::create([

            'name'=> 'admin4',
            'email' => 'a4@a.a',
            'password' => \Illuminate\Support\Facades\Hash::make('password')
        ]);

        \App\User::create([

        'name'=> 'admin5',
        'email' => 'a5@a.a',
        'password' => \Illuminate\Support\Facades\Hash::make('password')
    ]);
        \App\User::create([

            'name'=> 'admin6',
            'email' => 'a6@a.a',
            'password' => \Illuminate\Support\Facades\Hash::make('password')
        ]);

    }
}
