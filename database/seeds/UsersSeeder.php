<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'admin',
        	'password' => '$2y$10$9uI3w3SCPfmhUpbiF5nOsegtxr1tveF0cDWRaDFOlgOhJiUCRQtTa    
'
        ]);
    }
}
