<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @yield('style')
    @yield('script')
</head>
<body>
    @yield('content')
    <h1>여기는 마스터 블레이드</h1>
    @yield('foot')
    <!-- @ : blade 파일 -->
    <!-- 부모 blade.php파일 -->
</body>
</html>
