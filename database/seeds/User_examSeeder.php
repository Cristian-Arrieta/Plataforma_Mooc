<?php

use Illuminate\Database\Seeder;
use App\User_exam;



class User_examSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		User_exam::create([
		'resp1' => '4',
		'resp2' => '5',
		'resp3' => '6',
		'user_id' => '3',
		'exam_id' => '1',		
		]);
		
		User_exam::create([
		'resp1' => '4',
		'resp2' => '4',
		'resp3' => '6',
		'user_id' => '4',
		'exam_id' => '1',		
		]);
		
		User_exam::create([
		'resp1' => '4',
		'resp2' => '6',
		'resp3' => '6',
		'user_id' => '5',
		'exam_id' => '1',		
		]);
		
		
		
		
		
		User_exam::create([
		'resp1' => '4',
		'resp2' => '4',
		'resp3' => '6',
		'user_id' => '4',
		'exam_id' => '2',		
		]);
		
		User_exam::create([
		'resp1' => '4',
		'resp2' => '6',
		'resp3' => '6',
		'user_id' => '5',
		'exam_id' => '2',		
		]);
		
		
		
		User_exam::create([
		'resp1' => '4',
		'resp2' => '4',
		'resp3' => '6',
		'user_id' => '3',
		'exam_id' => '7',		
		]);
		
		User_exam::create([
		'resp1' => '4',
		'resp2' => '6',
		'resp3' => '6',
		'user_id' => '5',
		'exam_id' => '7',		
		]);
		
		
		User_exam::create([
		'resp1' => '4',
		'resp2' => '4',
		'resp3' => '6',
		'user_id' => '3',
		'exam_id' => '8',		
		]);
		
		User_exam::create([
		'resp1' => '4',
		'resp2' => '6',
		'resp3' => '6',
		'user_id' => '5',
		'exam_id' => '8',		
		]);
		
		
    }
}
