<footer>
    <p>우리는 영진 전문 대학교 컴퓨터 정보 계열 '일본 IT 기업 주문 반'입니다.</p>
</footer>

@section('script')
    @parent {{-- 자신의 아버지에 있는 script를 실행 후 자신의 scipt를 실행 --}}
    <script>
        alert('조각의 스크립트 섹션임');
    </script>
@stop
