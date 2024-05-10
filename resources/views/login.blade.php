<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Galada&family=Nunito:wght@400;500;600;800&family=Orelega+One&family=Poppins:wght@400;500;600&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Prompt' rel='stylesheet'>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <script src="login.js"></script>
    
</head>
<body>
    <div class="navbar">
        <div class="navbar-container">
            <div class="logobox">
                <a href="/" class="navLogo"><img src="./images/Logo.png" alt="" srcset=""></a>
            </div>
        </div>
    </div>
    <div class="login-container">
        <div class="login-decoration">
            <img class="decor-log" src="./images/login-decoration.png" alt="" srcset="">
        </div>
        <div class="form-container">
                <div class="form-header"><h1>EcoBite</h1></div>
                <br>

                <form action="{{ route('login.action') }}" method="POST">
                    @csrf
                    <div class="form">
                    @if ($errors->any())  
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                    <div class="inputbox">
                      <div class="title">Username</div>
                      <input type="text" placeholder="" id="username" name="username"/>
                    </div>
            
                    <div class="inputbox Password">
                      <div class="inputbox">
                        <div class="title">Password</div>
                        <input type="password" placeholder="" id="password" name="password"/>
                      </div>
                    </div>
                    <br>
                    <div class="showforget">
                      <div class="showpw">
                          <input type="checkbox" onclick="myFunction()">
                          <label for="check">Show Password</label>
                      </div>
                      <a href="" class="forgotpw">Forgot Password?</a>
                    </div>
                    
                    
                    <div class="buttonoption">
                      <button class="button" type="submit"><h3>Login</h3></button>
                      <div class="signUp">
                        <h3>Don't have an account yet?</h3>
                        <a href="/register"><h3><b>Register Now!</b></h3></a>
                      </div>
                  </div>
                </form>
                
        </div>
    </div>
</body>
</html>