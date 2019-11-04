@extends('layouts.app')

@section('content')
    {{-- Container : https://getbootstrap.com/docs/4.3/layout/overview/#containers --}}
    <div class="container">
        <h1>포럼 글 제목</h1>
        <hr />
        <ul>
            @forelse($articles as $article)
                <li>
                    {{ $article->title }}
                    <small>
                        by {{ $article->user->name }}
                    </small>
                </li>
            @empty
                <p>글이 없습니다.</p>
            @endforelse
        </ul>
    </div>

    @if($articles->count())
        <div class="text-center">
            {{-- XSS 보호 기능 끄기 : htmlspecialchars --}}
            {!! $articles->render() !!}
        </div>
    @endif
@stop
