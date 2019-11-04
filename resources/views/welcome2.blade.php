<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>여가 새로운 뷰란다. 잘 봐 둬!</h1>
    <h1>
        <?= isset($greeting)?"{$greeting}":'안녕하세요' ?>
        <?= $name; ?>
        <br />
        {{ $greeting ?? '안녕하세요' }}
        {{ $name }}
    </h1>

    @if($itemCount = count($items))
        <p>{{ $itemCount }} 종류의 과일을 판매중</p>
    @else
        <p>완판</p>
    @endif

    <ul>
        @foreach($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>

    <ul>
        @forelse($items as $item)
            <li>{{ $item }}</li>
        @empty
            <li>비어 있네?</li>
        @endforelse
    </ul>

</body>
</html>
