<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>FYPMS</title>
</head>

<body>
    <div class="container">
        <div class="login-form">
            @if ($errors->any())
                <div class="invalid-credential">{{ $errors->first() }}</div>
            @endif
            @if (session('status'))
                <div class="success-credential">{{ session('status') }}</div>
            @endif
            <form method="POST" action="{{ route('password.reset') }}">
                @csrf
                <div class="form-input"><input class="form-input-field" type="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required></div>
                <div class="form-input"><input class="form-input-field" type="password" name="password" placeholder="Password" required></div>
                <div class="form-input"><input class="form-input-field" type="password" name="password_confirmation" placeholder="comfirm password" required></div>
                <div class="submit-btn"><input class="submit" type="submit" value="Reset Password"></div>
            </form>
        </div>

    </div>
    @include('layouts.footer')
</body>

</html>
