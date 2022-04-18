// This code processes objects and events on the web page, so it must
// be placed at the bottom, at the very end of the footer.

var OEregisterbutton  = document.getElementById("OEregister-button");
var OEregistermodal   = document.getElementById("OEregister-modal");
var OEregisterclose   = document.getElementById("OEregister-close");

var OEchangebutton  = document.getElementById("OEchange-button");
var OEchangemodal   = document.getElementById("OEchange-modal");
var OEchangeclose   = document.getElementById("OEchange-close");

var OElogin          = document.getElementById("OElogin");
var OEloginmodal     = document.getElementById("OElogin-modal");
var OEloginclose     = document.getElementById("OElogin-close");


// Login processing button

OElogin.onclick = function() {
  OEloginmodal.style.display = "block";
}
OEloginclose.onclick = function() {
  OEloginmodal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == OElogin) {
    OEloginmodal.style.display = "none";
  }
}

// Registration processing

OEregisterbutton.onclick = function() {
  OEregistermodal.style.display = "block";
}

OEregisterclose.onclick = function() {
  OEregistermodal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == OEregistermodal) {
    OEregistermodal.style.display = "none";
  }
}

/////////////////////////////////////////////
//              Form Validation
/////////////////////////////////////////////


// Registration

function validateRegistrationForm() {

  var successflag = true;

  var name = document.OEregister.OEregister_form_name.value;
    document.getElementById("OEregister_form_name_err").innerHTML = "";
    if (name == "") {
      document.getElementById("OEregister_form_name_err").innerHTML = "Name is required.";
      successflag = false;
    }

  var email = document.OEregister.OEregister_form_email.value;
    document.getElementById("OEregister_form_email_err").innerHTML = "";
    var filter = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    if (email == "") {
      document.getElementById("OEregister_form_email_err").innerHTML = "Email is required.";
      successflag = false;
    } else if(filter.test(email) === false){
      document.getElementById("OEregister_form_email_err").innerHTML = "Email format is invalid.";
      successflag = false;
    }

  var pwdnew = document.OEregister.OEregister_form_pwdnew.value;
    document.getElementById("OEregister_form_pwdnew_err").innerHTML = "";
    if (pwdnew == "") {
      document.getElementById("OEregister_form_pwdnew_err").innerHTML = "Password is required.";
      successflag = false;
    }

  var pwdcon = document.OEregister.OEregister_form_pwdcon.value;
    document.getElementById("OEregister_form_pwdcon_err").innerHTML = "";
    if (pwdcon == "") {
      document.getElementById("OEregister_form_pwdcon_err").innerHTML = "Confirmation is required.";
      successflag = false;
    } else if (pwdcon != pwdnew) {
      document.getElementById("OEregister_form_pwdcon_err").innerHTML = "Confirmation doesnt match.";
      successflag = false;
    }

  return successflag;

}


//  Change Form

function validateChangeForm() {

  var successflag = true;

  var name = document.OEchange.OEchange_form_name.value;
    document.getElementById("OEchange_form_name_err").innerHTML = "";
    if (name == "") {
      document.getElementById("OEchange_form_name_err").innerHTML = "Name is required.";
      successflag = false;
    }

  var email = document.OEchange.OEchange_form_email.value;
    document.getElementById("OEchange_form_email_err").innerHTML = "";
    var filter = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    if (email == "") {
      document.getElementById("OEchange_form_email_err").innerHTML = "Email is required.";
      successflag = false;
    } else if(filter.test(email) === false){
      document.getElementById("OEchange_form_email_err").innerHTML = "Email format is invalid.";
      successflag = false;
    }

  var pwdnew = document.OEchange.OEchange_form_pwdnew.value;
    document.getElementById("OEchange_form_pwdnew_err").innerHTML = "";
    if (pwdnew == "") {
      document.getElementById("OEchange_form_pwdnew_err").innerHTML = "Password is required.";
      successflag = false;
    }

  var pwdcon = document.OEchange.OEchange_form_pwdcon.value;
    document.getElementById("OEchange_form_pwdcon_err").innerHTML = "";
    if (pwdcon == "") {
      document.getElementById("OEchange_form_pwdcon_err").innerHTML = "Confirmation is required.";
      successflag = false;
    } else if (pwdcon != pwdnew) {
      document.getElementById("OEchange_form_pwdcon_err").innerHTML = "Confirmation does not match.";
      successflag = false;
    }

  return successflag;

}


// Login Form

function validateLoginForm() {
  
  var successflag = true;

  var email = document.OElogin.OElogin_form_email.value;
    document.getElementById("OElogin_form_email_err").innerHTML = "";
    var filter = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    if (email == "") {
      document.getElementById("OElogin_form_email_err").innerHTML = "Email is required.";
      successflag = false;
    } else if(filter.test(email) === false){
      document.getElementById("OElogin_form_email_err").innerHTML = "Email format is invalid.";
      successflag = false;
    }

  var pwd = document.OElogin.OElogin_form_pass.value;
    document.getElementById("OElogin_form_pass_err").innerHTML = "";
    if (pwd == "") {
      document.getElementById("OElogin_form_pass_err").innerHTML = "Password is required.";
      successflag = false;
    }

  return successflag;

}
