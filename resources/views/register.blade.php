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
    <title>Register</title>

    {{-- link css --}}
    <link rel="stylesheet" href="register.css">
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
            <img class="decor-log" src="./images/register-decoration.png" alt="" srcset="">
        </div>
        <div class="form-container">
            <div class="form-header"><h1>EcoBite</h1></div>
            <br>

            <form action="{{ route('registerSave') }}" method="POST">
                @csrf
                <div class="form">
                    <div class="inputbox">
                      <div class="title">Full Name</div>
                      <input type="text" placeholder="Enter full name" id="name" name="name" oninput="validateName()"/>
                      <span id="nameError" class="error"></span>
                    </div>
            
                    <div class="inputbox">
                      <div class="title">Username</div>
                      <input type="text" placeholder="Create username" id="username" name="username" oninput="validateUsername()"/>
                      <span id="usernameError" class="error"></span>
                    </div>
            
                    <div class="inputbox Password">
                      <div class="inputbox">
                        <div class="title">Password</div>
                        <input type="password" placeholder="8 characters minimum" id="password" name="password" oninput="validatePassword()"/>
                        <span id="passwordError" class="error"></span> 
                      </div>
                    </div>
  
                    <div class="inputbox Password">
                      <div class="inputbox">
                        <div class="title">Confirm Password</div>
                        <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" oninput="validateConfirmPassword()"/>
                        <span id="confirmPasswordError" class="error"></span>
                      </div>
                    </div>

                    <div class="inputbox phoneNumber">
                        <div class="inputbox">
                          <div class="title">Phone Number</div>
                          <input type="number" placeholder="Phone Number" id="phone" name="phone" oninput="validatePhone()"/>
                          <span id="phoneError" class="error"></span>
                        </div>
                    </div>

                    <div class="inputbox address">
                        <div class="inputbox">
                          <div class="title">Address</div>
                          <input type="text" placeholder="Address" id="address" name="address" oninput="validateAddress()"/>
                          <span id="addressError" class="error"></span>
                        </div>
                    </div>
  
                    <div class="inputbox">
                      <div class="title">Date of Birth</div>
                      <input type="date" placeholder="DD/MM/YY" id="birthdate" name="birthdate" oninput="validateBirthdate()"/>
                      <span id="birthdateError" class="error"></span>
                    </div>
                    
                    <button class="button" id="registerBtn" type="submit"><h3>Register</h3></button>
                </div>
            </form> 
        </div>
    </div>
    <script src="/register.js"></script>
</body>
</html>