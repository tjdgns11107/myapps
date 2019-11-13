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

// Route::get(
//     '/',                // url 요청 경로(url), GET
//     function () {       // 요청처리 함수, 콜백, 클로저
//         return view('welcome'); // View() : 뷰 객체를 만들어 응답
//         // 인자 : 뷰 파일 지정
//         //        resources/views/뷰파일명.blade.php
//     }
// );

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

// Route::get(
//     '/databind',
//     function() {
//         $fruits = ['레몬', '딸기', '자몽', '수박'];

//         // return view('welcome2')->with('name', 'Foo');
//         return view('welcome2', [
//             'name' => 'Foo',
//             'greeting' => '안녕~', 
//             'items' => $fruits,
//         ]);
//     }
// );


// Route::get('/inherit', function() {
//     return view('welcome3');
// });

Route::get('/', 'WelcomeController@index');

Route::resource('articles', 'ArticlesController');

Route::get('auth/login',function() {
    $credentials = [    // 로그인 기능 : 입력 구현 하는 것을 권장
        'email' => 'changyj@yju.ac.kr',
        'password' => 'password'
    ];
    // Auth 파서드와 같은 기능
    if(!auth()->attempt($credentials)) {
        // attempt : 시도하다.
        // 즉, $credentials의 값을 통해서 로그인을 시도하는 과정
        // return이 true인 경우 : 로그인 성공 / false인 경우 : 어떠한 이유로 인해 로그인 실패
        return '로그인 실패 함';
    }
    //로그인 성공 시
    return redirect('protected');
});

Route::get(
    'protected',
    ['middleware'=>'auth',  //auth 미들웨어 실행 후 클로저(function())가 실행 됨
        function() {
            dump(session()->all());
            // session() 객체의 모든 것(all)을 들고 와서 화면에 나타내라(dump) -> 화면 덤프 파일
                // 미들웨어 사용으로 인한 if문 삭제
                // if(!auth()->check()) {
                // auth()->check() : 로그인 상태인지 확인
                // return이 true인 경우 : 로그인 상태 / false인 경우 : 로그아웃인 상태
                // return '로그인 하십시오';
            // }
            return '환영, welcome, いらっしゃいませ!' . auth()->user()->name;
            // auth()->user()->name : 로그인 한 유저 객체(auth()->user())의 이름(name) 필드를 가지고 옴
        }
    ]
);

Route::get('auth/logout', function() {
    auth()->logout();
    return '또 봅시다!';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// DB::listen(function ($query) {
//     var_dump($query->sql);
// });

// Event::listen('article.created', function($article) {
//    var_dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
//    var_dump($article->toArray());
// });

Route::get('mail', function() {
    $article = App\Article::with('user')->find(1);

    // Mail 파사드의 send() : 메일 보내기, Mail::request()
    return Mail::send(
        'emails.articles.created',          // 인수 1: 메일 내용의 뷰파일
        compact('article'),                 // 인수2 : 뷰에 전달할 데이터
        // use ()
        // inner function 에서 outer function 의 변수를 사용할 수 있다.
        // ( 자바스크립트는 그냥 사용, php 는 명시적으로 선언 해 줘야함.)    
        function ($message) use($article) {
            // 보내는 사람
            $message->from('admin@g.yju.ac.kr');
            // 받는 사람
            $message->to(['tjdgns11107@g.yju.ac.kr']);
            // 이메일 참고 할 사람(참조)
            $message->cc('tjdgns11107@g.yju.ac.kr');
            // 숨은 참고를 할 사람
            // $message->bcc();
            // 첨부 파일 사용
            // storage_path() : storages 폴더 내의 파일의 절대 경로를 반환하는 헬퍼 함수
            // $message->attach(storage_path('ElePHPant.png'));
            $message->subject('새 글이 등록되었습니다. -' . $article->title);
        }
    );
});
