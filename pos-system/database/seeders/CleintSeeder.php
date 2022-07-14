<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CleintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = ['عبدالرحمن إبراهيم', 'yosuf ibrahim'];
        foreach($clients as $client){
            Client::create([
                'name'=> $client,
                'phone'=>'01223456250',
                'address' => 'الإسكندرية'
            ]);
        }

    }
}
