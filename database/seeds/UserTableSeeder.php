<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'HoVanNhan',
                'email'=>'hovannhan.php@gmail.com',
                'password'=>bcrypt('123456'),
                'user_type'=>0,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
        ]);
    }
}
