<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime=date('Y-m-d H:i:s');
        DB::table('status')->insert([
            [
                'id'=>1,
                'name'=>'pending',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>2,
                'name'=>'approved',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>3,
                'name'=>'shipping',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>4,
                'name'=>'finish',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>5,
                'name'=>'cancel',
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
        ]);
    }
}
