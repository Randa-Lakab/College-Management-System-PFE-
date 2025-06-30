const signInBtnlink=document.querySelector(".signInBtn-link");
const signUpBtnlink=document.querySelector(".signUpBtn-link");
const wrapper=document.querySelector(".wrapper");

signUpBtnlink.addEventListener('click',()=>{
    wrapper.classList.toggle('active');
});    

signInBtnlink.addEventListener('click',()=>{
    wrapper.classList.toggle('active');
});    

document.addEventListener("DOMContentLoaded", () => {
    function showError(inputElement, message) {
        const errorDiv = inputElement.parentElement.querySelector(".error-message");
        errorDiv.textContent = message;
    }

    function clearErrors(form) {
        const errorMessages = form.querySelectorAll(".error-message");
        errorMessages.forEach(error => error.textContent = "");
    }

    const loginForm = document.querySelector(".sign-in form");
    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();
        clearErrors(loginForm);

        const nameInput = loginForm.querySelector('input[type="text"]');
        const passwordInput = loginForm.querySelector('input[type="password"]');
        const rememberInput = loginForm.querySelector('input[type="checkbox"]');

        const name = nameInput.value.trim();
        const password = passwordInput.value.trim();
        const remember = rememberInput.checked;

        const namePattern = /^[A-Za-z\u0600-\u06FF\s]+$/;
        let valid = true;

        if (!namePattern.test(name)) {
            showError(nameInput, "الاسم يجب أن يحتوي على حروف فقط.");
            valid = false;
        }

        if (password.length !== 8) {
            showError(passwordInput, "كلمة المرور يجب أن تتكون من 8 أحرف بالضبط.");
            valid = false;
        }

        if (!remember) {
            showError(rememberInput, "يجب تفعيل خيار 'تذكرني'.");
            valid = false;
        }
        if (valid) {
            loginForm.submit(); // Envoie le formulaire au fichier login.php
        }
       
    });

    const signUpForm = document.querySelector(".sign-Up form");
    signUpForm.addEventListener("submit", function (e) {
        e.preventDefault();
        clearErrors(signUpForm);

        const nameInput = signUpForm.querySelector('input[type="text"]');
        const emailInput = signUpForm.querySelector('input[type="email"]');
        const passwordInput = signUpForm.querySelector('input[type="password"]');
        const agreeInput = signUpForm.querySelector('input[type="checkbox"]');

        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();
        const agree = agreeInput.checked;

        const namePattern = /^[A-Za-z\u0600-\u06FF\s]+$/;
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

        let valid = true;

        if (!namePattern.test(name)) {
            showError(nameInput, "الاسم يجب أن يحتوي على حروف فقط.");
            valid = false;
        }

        if (!emailPattern.test(email)) {
            showError(emailInput, "يرجى إدخال بريد إلكتروني صالح.");
            valid = false;
        }

        if (password.length !== 8) {
            showError(passwordInput, "كلمة المرور يجب أن تتكون من 8 أحرف بالضبط.");
            valid = false;
        }

        if (!agree) {
            showError(agreeInput, "يجب الموافقة على الشروط.");
            valid = false;
        }

        if (valid) {
            loginForm.submit(); // Envoie le formulaire au fichier login.php
        }
    });

    // تبديل بين النماذج

});