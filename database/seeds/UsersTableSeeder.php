<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()   // 시더가 실행되면 작동 할 코드 작성
    {
        factory(App\User::class, 5)->create();

        //App\User::create([
            // 'name' => sprintf('%s %s', str_random(3), str_random(4)),
            // sprintf(형식문자열, 인수리스트) : 형식문자열에 지정한 형태로 문자열을 생성해서 반환
            // f - format : format에 맞는 출력 => 반환 값이 문자열이다.
            // tr_random(인자) : 인자 값의 길이의 문자열 랜덤 생성
            // 'email' => str_random(10) . '@yju.ac.kr',
            // 'password' => bcrypt('password'),

            // 'name' => sprintf('%s %s', Str::random(3), Str::random(4)),
            // 'email' => Str::random(10) . '@test.com',
            // 'password' => bcrypt('password'),
        //]);
    }
}
