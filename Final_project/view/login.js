const form = document.getElementById('formId');
const email = document.getElementById('emailId');
const emailError = document.getElementById('emailErrorId');
const password = document.getElementById('passwordId');
const passwordError = document.getElementById('passwordErrorId');

// Show input error message
function showError(field, errorField, errorMessage) {
  const formControl = field.parentElement;
  formControl.className = 'form-control error';
  errorField.innerText = errorMessage;
}

// Show success outline
function showSuccess(input, errorField) {
  const formControl = input.parentElement;
  formControl.className = 'form-control success';
  errorField.innerText = "";
}

// Check email is valid
function checkEmail(input) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(input.value.trim())) {
    showSuccess(input, emailError);
    return true;
  } else {
    showError(input,emailError, 'Email is not valid');
    return false;
  }
}

// Check passwor is valid
function checkpassword(input) {
  const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})");
  if (re.test(input.value.trim())) {
    showSuccess(input, passwordError);
    return true;
  } else {
   // const passwordError = document.getElementById('passwordErrorId');
    showError(input,passwordError, 'password is not valid');
    return false;
  }
}


// Event listeners
form.addEventListener('submit', function(e) {
    e.preventDefault();

    if(checkEmail(email) && checkpassword(password)){
      $.ajax({
        type: 'POST',
        url: '/final/Controller/logincheck.php',
        data:  {email: email.value.trim(), password: password.value.trim()},
        success: function(data){
          if($.trim(data) === "1"){
            setTimeout(' window.location.href =  "Dashboard.php"', 1000);
            //alert('success.');
          }else{
            alert($.trim(data));
          }
        },
        error: function(data){
          alert('invalid credential');
        }
      });
    }

  
  });

