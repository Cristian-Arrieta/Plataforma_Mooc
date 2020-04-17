<?php

use Illuminate\Database\Seeder;
use App\User;
use Caffeinated\Shinobi\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
		$user = User::create([
		'name' => 'Admin',
		'lastname' => 'Admin',
		'dni' => '12365478',
		'email' => 'asd@asd.asd',
		'password' => Hash::make('123456')
		
		]);
		
		
		$user->roles()->sync(1);
		
		$user = User::create([
		'name' => 'Prof',
		'lastname' => 'Prof',
		'dni' => '12345678',
		'email' => 'prof@prof.prof',
		'password' => Hash::make('123456')
		
		]);
		
		
		$user->roles()->sync(2);
		
		$user = User::create([
		'name' => 'Alum',
		'lastname' => 'Alum',
		'dni' => '32165498',
		'email' => 'alum@alum.alum',
		'password' => Hash::make('123456')
		
		]);
		
		
		$user->roles()->sync(3);
		
		
		$user = User::create([
		'name' => 'Alum2',
		'lastname' => 'Alum2',
		'dni' => '32165499',
		'email' => 'alum2@alum2.alum2',
		'password' => Hash::make('123456')
		
		]);
		
		
		$user->roles()->sync(3);
		
		
		$user = User::create([
		'name' => 'Alum3',
		'lastname' => 'Alum3',
		'dni' => '32165490',
		'email' => 'alum3@alum3.alum3',
		'password' => Hash::make('123456')
		
		]);
		
		
		$user->roles()->sync(3);
		
		
		$user = User::create([
		'name' => 'Alum4',
		'lastname' => 'Alum4',
		'dni' => '32165491',
		'email' => 'alum4@alum4.alum4',
		'password' => Hash::make('123456')
		
		]);
		
		
		$user->roles()->sync(3);
		
		factory (User::class,10)->create();
		
    }
}
