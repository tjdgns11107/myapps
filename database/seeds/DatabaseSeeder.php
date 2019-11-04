<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        if (config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            // Chapter 07 참고
        }
        

        // Model::unguard(); // mass assignment 허용
        App\User::truncate(); 
        // 모든 데이터 삭제, auto_increment 컬럼값을 0로 초기화
        $this->call(UsersTableSeeder::class);
        // $this->call() 은 시더.php에서 run 메서드 호출

        App\Article::truncate();
        $this->call(ArticlesTableSeeder::class);
        // Model::reguard(); // mass assignment 불허

        if (config('database.default') !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}