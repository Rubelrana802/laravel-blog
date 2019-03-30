<?php

use Illuminate\Database\Seeder;

class commentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('comments')->insert([
        	['user_id' => 1, 'post_id' => 1, 'content' => "comments one Content"],
        	['user_id' => 1, 'post_id' => 2, 'content' => "comments two Content"],
        	['user_id' => 1, 'post_id' => 3, 'content' => "comments three Content"],
        ]);
    }
}
