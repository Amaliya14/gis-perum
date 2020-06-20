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
        	'email' => 'perum@gmail.com',
        	'password' => bcrypt('12345678')
        ]);
    }
}
