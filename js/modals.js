// This code processes objects and events on the web page, so it must
// be placed at the bottom, at the very end of the footer.

// Login processing
var OEloginbutton   = document.getElementById("OElogin-button");
var OEprofilebutton = document.getElementById("OEprofile-button");
var OEloginmodal    = document.getElementById("OElogin-modal");
var OEloginopen     = document.getElementById("OElogin-open");
var OEloginclose    = document.getElementById("OElogin-close");

OEloginbutton.onclick = function() {
  OEloginmodal.style.display = "block";
}
OEloginclose.onclick = function() {
  OEloginmodal.style.display = "none";
}
OEloggedin = function(member, password, name) {
  // after successful auth this should change the login icon to a profile icon and set the cookies for 1 day
  OEloginbutton.style.display = "none";
  OEprofilebutton.style.display = "block";
  setCookie('OEmember', member, 1);
  setCookie('OEpassword', password, 1);
  document.getElementById("OEregister-button").style.display = "none";
  document.getElementById("OEprofile-button").innerHTML = "Z";
}
OEloggedout = function() {
  // after successful auth this should change the login icon to a profile icon
  OEloginbutton.style.display = "block";
  OEprofilebutton.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == OEloginmodal) {
    OEloginmodal.style.display = "none";
  }
}

// Registration processing
var OEregistermodal   = document.getElementById("OEregister-modal");
var OEregisterbutton  = document.getElementById("OEregister-button");
var OEregisterclose   = document.getElementById("OEregister-close");

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

// Profile processing
var OEprofilemodal   = document.getElementById("OEprofile-modal");
var OEprofilebutton  = document.getElementById("OEprofile-button");
var OEprofileclose   = document.getElementById("OEprofile-close");

OEprofilebutton.onclick = function() {
  OEprofilemodal.style.display = "block";
}

OEprofileclose.onclick = function() {
  OEprofilemodal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == OEprofilemodal) {
    OEprofilemodal.style.display = "none";
  }
}

function validateRegistrationForm() {

  var successflag = true;

  var name = clean_input(document.OEregister.OEregister_form_name.value);
    document.getElementById("OEregister_form_name_err").innerHTML = "";
    if (name == "") {
      document.getElementById("OEregister_form_name_err").innerHTML = "Name is required.";
      successflag = false;
    }

  var email = clean_input(document.OEregister.OEregister_form_email.value);
    document.getElementById("OEregister_form_email_err").innerHTML = "";
    var filter = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
    if (email == "") {
      document.getElementById("OEregister_form_email_err").innerHTML = "Email is required.";
      successflag = false;
    } else if(filter.test(email) === false){
      document.getElementById("OEregister_form_email_err").innerHTML = "Email format is invalid.";
      successflag = false;
    }

  var pwdnew = clean_input(document.OEregister.OEregister_form_pwdnew.value);
    document.getElementById("OEregister_form_pwdnew_err").innerHTML = "";
    if (pwdnew == "") {
      document.getElementById("OEregister_form_pwdnew_err").innerHTML = "Password is required.";
      successflag = false;
    }

  var pwdcon = clean_input(document.OEregister.OEregister_form_pwdcon.value);
    document.getElementById("OEregister_form_pwdcon_err").innerHTML = "";
    if (pwdcon == "") {
      document.getElementById("OEregister_form_pwdcon_err").innerHTML = "Confirmation is required.";
      successflag = false;
    } else if (pwdcon != pwdnew) {
      document.getElementById("OEregister_form_pwdcon_err").innerHTML = "Confirmation does not match.";
      successflag = false;
    }

  return successflag;

}

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
