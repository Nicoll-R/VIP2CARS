<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login</h1>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button type="submit">login</button>
    </form>
</body>
</html>