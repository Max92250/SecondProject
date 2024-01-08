<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
   
</head>

<body>
    <div class="container">

       
        <div class="form-container">
            <h2>Register</h2>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label for="name">Name:</label>
                @if ($errors->has('username_error'))
                <div class="error-message">
                    {{ $errors->first('username_error') }}
                </div>
            @endif
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>

</html>
