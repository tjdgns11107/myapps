<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = \App\Article::get();
        // 즉시 로드
        // $articles = \App\Article::with('user')->get();
        // 지연 로드
        // $articles->load('user');
        // $articles = \App\Article::get();
        // paginate(인수)에 의해 페이지 당 인수 만큼 글이 나오며, ?page=페이지수 로 내용 확인 가능
        $articles = \App\Article::with('user')->latest()->paginate(3);
        // 뷰를 디버깅 할 때 사용
        // 뷰 파일에서 {{ dd('reached') }} 와 같이 사용하면
        // 그 부분을 기점으로 위 혹은 아래 중 어디에서 에러가 발생하는지 확인 가능
        // dd(view('articles.index', compact('articles'))->render());

        // 아래의 compact는 https://www.php.net/manual/en/function.compact.php 참조
        return view('articles.index', compact('articles'));
        // return __METHOD__ . '은(는) Article 컬렉션을 조회합니다.';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return __METHOD__ . '은(는) Article 컬렉션을 만들기 위한 폼을 담은 뷰를 반환합니다.';
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 새로은 Article 컬렉션을 만듭니다.';

    //     $rules = [
    //         // 유효성 체크 필드 설정 룰 저장
    //         'title' => ['required'],    // '필드' => ['검사 조건']
    //         'content' => ['required', 'min:10'],
    //     ];

    //     $messages = [
    //         'title.required' => '제목은 필수 입력 항목입니다.',
    //         'content.required' => '본문은 필수 입력 항목입니다.',
    //         // :min -> placeholder
    //         'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.',
    //     ];

    //     // $validator = \Validator::make($request->all(), $rules);
    //     // $validator = \Validator::make($request->all(), $rules, $messages);

    //     $this->validate($request, $rules, $messages);

    //     // if($validator->fails()) {
    //     //     return back()->withErrors($validator)->withInput();
    //     // }

    //     $article = \App\User::find(1)->articles()->create(
    //         $request->all()
    //     );

    //     if(! $article) {
    //         return back()->with('flash_message', '글 작성 실패')->withInput();
    //     }

    //     return redirect(route('articles.index'))->with('flash_message', '글 작성 성공');
    // }

    public function store(\App\Http\Requests\ArticlesRequest $request)
    {
        $article = \App\User::find(1)->articles()->create($request->all());

        //$article는 auth()->user()->articles()->create()를 호출함
        //==> 로그인한 유저의 게시판을 작성
        if (!$article) {
            return back()->wtih('flash_message', '글 작성 실패')->wtihInput();
        }

        // var_dump('이벤트를 던집니다.');
        //article의 created이벤트가 발생하면 article를 던져줌
        // event('article.created', [$article]);
        // event(new \App\Events\ArticleCreated($article));
        // var_dump('이벤트를 던졌습니다.');
        event(new \App\Events\ArticlesEvent($article));

        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo $foo;

        $article = \App\Article::findOrFail($id);
        // 도우미 함수로, 받은 값을 덤프하고 실행을 멈춤
        dd($article);

        // return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 조회합니다.' . $id;
        return $article->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 수정하기 위한 폼을 담은 뷰를 조회합니다.' . $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return __METHOD__ . '은(는) 사용자의 입력한 폼 데이터로 다음 기본 키를 가진 Article 모델을 수정합니다.' . $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __METHOD__ . '은(는) 다음 기본 키를 가진 Article 모델을 삭제합니다.';
    }
}
