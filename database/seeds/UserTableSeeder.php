<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // DB::statement('TRUNCATE users CASCADE');
        User::truncate();
        factory(User::class)->create([
            'first_name'     => 'Teixeira',
            'last_name'      => 'Gabriel',
            'email'          => 'llucasgabriell@gmail.com',
            'role'           => 'admin',
            'password'       => bcrypt(123456),
            'remember_token' => str_random(10)
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'first_name'     => 'Gabriel',
            'last_name'      => 'Teixeira',
            'email'          => 'admin@email.com',
            'role'           => 'admin',
            'password'       => bcrypt(123456),
            'remember_token' => str_random(10)
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'first_name'     => 'Client',
            'last_name'      => 'User',
            'email'          => 'user@email.com',
            'password'       => bcrypt(123456),
            'remember_token' => str_random(10)
        ])->client()->save(factory(Client::class)->make());

        factory(User::class, 10)->create()->each(function($u){
            $u->client()->save(factory(Client::class)->make());
        });

        factory(User::class)->create([
            'first_name'     => 'Deliveryman',
            'last_name'      => 'User',
            'email'          => 'deliveryman@email.com',
            'role'           => 'deliveryman',
            'password'       => bcrypt(123456),
            'remember_token' => str_random(10)
        ]);

        factory(User::class, 3)->create([
            'role'           => 'deliveryman',
        ]);
    }
}
