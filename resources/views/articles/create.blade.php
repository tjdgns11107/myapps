@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>새 포럼 글 쓰기</h1>

        <hr />

        <form action="{{ route('articles.store') }}" method="POST">
            {!! csrf_field() !!} {{-- @csrf : @는 blade에서 사용할 때 --}}
            {{-- route()->url 경로, csrf_field()->csrf 대응 / 도우미 함수 (csrf : Cross-Site Request Forgery)   --}}

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">제목</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-errors' : ''}}">
                <label for="content">본문</label>
                <textarea name="content" id="content" rows="10" class="form-control">{{ old('content') }}</textarea>
                {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group">
                <button type="submit">저장하기</button>
            </div>
        </form>
    </div>

@stop
