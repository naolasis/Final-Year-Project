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
                <div class="username input">
                    <input class="input-field" type="text" name="username" placeholder="Enter Your Username">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#5C5470"; d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                </div>
                <label for="password">Password</label>
                <div class="password input">
                    <input class="input-field" type="password" name="password" placeholder="Password">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#5C5470"; d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                </div>
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