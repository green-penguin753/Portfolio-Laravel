<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class TodoPractice2Seeder extends Seeder
{
    public function run(): void
    {
        DB::table('todo_practice2s')->insert(
            [
                [
                    'title' => '買い物に行く',
                    'body' => '牛乳と卵を買う',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => '掃除機をかける',
                    'body' => 'リビングと寝室を丁寧に',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]

        );
    }
}
