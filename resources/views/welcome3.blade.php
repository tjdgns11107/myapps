{{-- 자식 blade.php파일 --}}

@extends('layouts.master')
{{-- 이 곳에 아무 내용이 없어도 layouts/master.blade.php의 내용을 불러 옴 --}}

@section('content')
    <h1>자식이야 잘 받아.</h1>
@endsection

@section('style')
    <style>
        body {
            background-color: green;
            color: white;
        }
    </style>
@stop

@section('foot')
    @include('partials.footer')
@stop

@section('script')
    <script>
        alert('자식의 스크립트 섹션임');
    </script>
@stop
