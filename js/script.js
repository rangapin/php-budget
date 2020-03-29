function checkPass() {
    if(document.signup.password.value != document.signup.repeat.value)
    {alert('Password and repeat Password does not match'); 
    document.signup.repeat.focus();
    return false;
}
    return true;
} 