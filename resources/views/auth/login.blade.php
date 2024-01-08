<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
</head>

<body>
    @error('errors')
    <div style="color: red;">
        {{ $message }}
    </div>
@enderror
<div class="container">
    <p class="text">Login </p>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="name">Username:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
</body>
</html>