
    // Take all input value
    var fullName = document.getElementById('name');
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('confirmPassword');
    var phone = document.getElementById("phone")
    var address = document.getElementById("address")
    var birthdate = document.getElementById('birthdate');

    // Take all the error message container
    var nameError = document.getElementById('nameError');
    var usernameError = document.getElementById('usernameError');
    var passwordError = document.getElementById('passwordError');
    var confirmPasswordError = document.getElementById('confirmPasswordError');
    var phoneError = document.getElementById('phoneError');
    var addressError = document.getElementById('addressError');
    var birthdateError = document.getElementById('birthdateError');

    var regisBtn = document.getElementById("registerBtn");

    function validateName(){
        if (fullName.value == "" ){
            fullName.style.borderColor = "red"
            nameError.innerHTML = "Name cannot be empty"
            return false
        } else {
            fullName.style.borderColor = ""
            nameError.innerHTML = ""
            return true
        }
    }

    function validateUsername(){
        if (username.value == "" ){
            username.style.borderColor = "red"
            usernameError.innerHTML = "Username cannot be empty"
            return false
        } else {
            username.style.borderColor = ""
            usernameError.innerHTML = ""
            return true
        }
    }

    function validatePassword(){
        if (password.value == "" ){
            password.style.borderColor = "red"
            passwordError.innerHTML = "Password cannot be empty"
            return false
        } else if(password.value.length < 8){
            password.style.borderColor = "red"
            passwordError.innerHTML = "Password must be longer than 8 character"
            return false
        } else {
            password.style.borderColor = ""
            passwordError.innerHTML = ""
            return true
        }
    }

    function validateConfirmPassword(){
        if (confirmPassword.value == "" ){
            confirmPassword.style.borderColor = "red"
            confirmPasswordError.innerHTML = "Password cannot be empty"
            return false
        } else if(confirmPassword.value != password.value){
            confirmPassword.style.borderColor = "red"
            confirmPasswordError.innerHTML = "Confirm password must be the same as password"
            return false
        } else {
            confirmPassword.style.borderColor = ""
            confirmPasswordError.innerHTML = ""
            return true
        }
    }

    function validatePhone(){
        if (phone.value == "" ){
            phone.style.borderColor = "red"
            phone.innerHTML = "Phone cannot be empty"
            return false
        } else {
            phone.style.borderColor = ""
            phone.innerHTML = ""
            return true
        }
    }

    function validateAddress(){
        if (address.value == "" ){
            address.style.borderColor = "red"
            address.innerHTML = "Address cannot be empty"
            return false
        } else {
            address.style.borderColor = ""
            address.innerHTML = ""
            return true
        }
    }

    function validateBirthdate(){
        if (birthdate.value == "" ){
            birthdate.style.borderColor = "red"
            birthdateError.innerHTML = "Birthdate cannot be empty"
            return false
        } else {
            birthdate.style.borderColor = ""
            birthdateError.innerHTML = ""
            return true
        }
    }
    
    regisBtn.addEventListener('click', function(e){
        validateName() 
        validateUsername() 
        validatePassword()
        validateConfirmPassword()
        validatePhone() 
        validateAddress()
        validateBirthdate()

        if (validateName() && validateUsername() && validatePassword() && validateConfirmPassword() && validatePhone() && validateAddress() && validateBirthdate()){
            alert('Registration Sucessful')
        } else {
            e.preventDefault()
        }

    })
    

