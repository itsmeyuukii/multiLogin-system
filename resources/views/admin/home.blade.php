<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Admin Home
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <input type="submit" value="logout">
    </form>
</body>
</html>