<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        // 로그로 예외 리포트하지 않을 예외 리포트를 작성
        // Illuminate\Auth\AuthentiactionException::class, -> 로그인 인증과 관련 된 예외를 리포트에 추가하지 않겠다
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // 예외를 브라우저 화면으로 남김

        if(app()->environment('production')) {
            // app() : 헬퍼 함수로서 Illuminate\Foundation\Application의 객체를 반환
            // environment() 메서드 : .env의 APP_ENV 값을 읽어서 반환
            if($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response(
                    view(
                        'errors.notice',
                        [
                            'title' => '찾을 수 없습니다.',
                            'description' => '죄송합니다. 요청하신 페이지는 찾을 수 없습니다.',
                        ]
                    ), 404
                );
                // response(인자1, 인자2) : 헬퍼 함수. 응답 객체 생성
            }
        }

        return parent::render($request, $exception);
    }
}
