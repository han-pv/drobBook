<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Bir zat bar controllerden geldi</h1>


    @foreach ($categories as $category)
        <h1>{{ $category->id . ' ' . $category->name }}</h1>
        <h3>{{ $category->created_at->format('d.m.y') }} y</h3>
    @endforeach

    <br>
    @foreach ($authors as $author)
        <h2>{{ $author }}</h2>
    @endforeach


</body>

</html>