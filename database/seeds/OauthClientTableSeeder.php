<?php

use Illuminate\Database\Seeder;
use App\Models\OauthClient;

class OauthClientTableSeeder extends Seeder
{
    public function run()
    {
        //DB::statement('TRUNCATE oauth_clients CASCADE');
        OauthClient::truncate();
        factory(OauthClient::class)->create([
            "name"	=>"Application"
        ]);
        //factory(OauthClient::class, 10)->create();   
    }
}