let userEmail = localStorage.getItem("email");
let content = document.getElementById("").innerHTML = userEmail;
let i = 0;
setInterval(function(){
    if (userEmail) {
        const details = document.querySelector('span');
        
        fetch('email')
        .then(function(response) {
            return response.formData();
        })
        .then(function(myForm) {
            const objectURL = URL.createObjectURL(myForm);
            myDetails.src = objectURL;
        });
        localStorage.clear();
    }
},1000);

let button=document.getElementById("login");
let email=document.getElementById("email");
let password=document.getElementById("password");
button.addEventListener("click", (e) =>{
    e.preventDefault();
    let mail = email.value;
    localStorage.setItem("mail", mail);
    let pass = password.value;
    localStorage.setItem("pass", pass);
})