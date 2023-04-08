	// Validtion Code For Inputs

  var email = document.forms['form']['email'];
  var password = document.forms['form']['password'];
  
  var email_error = document.getElementById('email_error');
  var pass_error = document.getElementById('pass_error');
  
  email.addEventListener('textInput', email_Verify);
  password.addEventListener('textInput', pass_Verify);

  // regular expression to check valid email address
  const emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  // password must have length >=8, contain lowercase uppercase and digit
  const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

  function validated(){

    // if email checking is fail
    if (!emailPattern.test(email.value)) {
      email.style.border = "1px solid red";
      email_error.style.display = "block";
      email.focus();
      return false;
    }

    // if password checking is fail
    if (!passwordPattern.test(password.value)) {
      password.style.border = "1px solid red";
      pass_error.style.display = "block";
      password.focus();
      return false;
    }

   
  }
  function email_Verify(){
    if (emailPattern.test(email.value)) {
      email.style.border = "1px solid silver";
      email_error.style.display = "none";
      return true;
    }
  }
  function pass_Verify(){
    if (passwordPattern.test(password.value)) {
      password.style.border = "1px solid silver";
      pass_error.style.display = "none";
      return true;
    }
  }
  
  

  