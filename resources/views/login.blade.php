<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>FYPMS</title>
</head>
<body>
    <div class="container">
        <div class="login-header">
            <div class="logo"><img src="{{asset('assets/images/logo.png')}}" alt="Ambo University Logo"> <h1>FYPMS</h1>  </div>
        </div>
        <div class="login-form">
            <div class="invalid-credential">invalid credential</div>
            <form action="">
                <label for="username">Username</label>
                <div class="username input"><input class="input-field" type="text" name="username" placeholder="Enter Your Username"></div>
                <label for="password">Password</label>
                <div class="password input"><input class="input-field" type="password" name="password" placeholder="Password"></div>
                <div class="submit-btn"><input class="submit" type="submit" value="Login"></div>
            </form>
            <a href="#">Forgot Password?</a>
        </div>
    </div>
    <footer class="footer">
        <p>Copy Right &copy; 2024 FYPM Inc. All Right Reserved.</p>
    </footer>
</body>
</html>