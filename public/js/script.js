const loginForm = document.getElementById("loginForm");

const nim = document.getElementById("nim");
const password = document.getElementById("password");

const nimError = document.getElementById("nimError");
const passwordError = document.getElementById("passwordError");

loginForm.addEventListener("submit", function(event){
  event.preventDefault();

  let valid = true;

  nimError.textContent = "";
  passwordError.textContent = "";

  if(nim.value.trim() === ""){
    nimError.textContent = "NIM atau Email wajib diisi";
    valid = false;
  }

  if(password.value.trim() === ""){
    passwordError.textContent = "Password wajib diisi";
    valid = false;
  }

  if(valid){
    window.location.href = "/dashboard";
  }
});