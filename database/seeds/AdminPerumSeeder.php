<?php

use Illuminate\Database\Seeder;
use App\AdminPerum;

class AdminPerumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         AdminPerum::create([
        	'nama' => 'Perum 1',
        	'username' => 'perum',
        	'password' => bcrypt('12345678')
        ]);
    }
}
