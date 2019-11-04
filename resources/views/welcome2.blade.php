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
    <h1><?= isset($greeting)?"{$greeting}":'안녕하세요' ?>
    <?= $name; ?>
    </h1>
</body>
</html>
