const form = document.getElementById('formId');
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
    checkpassword(password);

  
  });
