<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',                // url 요청 경로(url), GET
    function () {       // 요청처리 함수, 콜백, 클로저
        return view('welcome'); // View() : 뷰 객체를 만들어 응답
        // 인자 : 뷰 파일 지정
        //        resources/views/뷰파일명.blade.php
    }
);

// Route::get(
//     '/{Foo?}',          // URL 파라미터 처리
//     function($Foo='여기가 디폴트 값') {
//         return "<h1> {$Foo} 을 URL로부터 받음</h1>";
//     }
// );

// Route::get(
//     '/test/{Foo?}',     // URL 파라미터 처리
//     function($Foo='두번째 디폴트 값') {
//         return "<h1> {$Foo} 을 URL로부터 받음</h1>";
//     }
// );

// Route::pattern('Foo', '[0-9a-zA-Z!]{4}');
// // [0-9a-zA-Z~]{4} : 0~9, a~z, A~Z, ~을 입력할수 있고, 자리 수는 4자리까지 가능

// Route::get(
//     '/{Foo?}',
//     function($Foo='돈') {
//         return "{$Foo} 부자";
//     }
// );

// Route::get(
//     '/{Foo?}',
//     function($Foo='돈') {
//         return "{$Foo} 부자";
//     }
// )->where('Foo', '[0-9a-zA-Z!]{3}');

// Route::get(
//     '/',
//     [
//         "as"=>'home',
//         function() {
//             return '여는 다른 라우팅인데 이름이 alias야!';
//         }
//     ]   // 클로저가 아닌 배열로 줄 수 있다
// );

// Route::get(
//     '/home',
//     function() {
//         return redirect(route('home'));
//     }
// );

// Route::get(
//     '/',
//     function() {
//         return view('errors.503');
//         // errors.503에서 .(점)을 기준으로 앞 : 디렉토리 / 뒤 : 파일 이름
//         // 점(.)대신 슬래시(/)도 가능
//    }
// );

Route::get(
    '/databind',
    function() {
        // return view('welcome2')->with('name', 'Foo');
        return view('welcome2', [
            'name' => 'Foo',
            'greeting' => '안녕~', 
        ]);
    }
);
