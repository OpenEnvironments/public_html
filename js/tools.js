// These are utilities reused across the website,
//     rather than being dedicated to a single feature.

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validate_registration() {

		if (	document.getElementById("OEregister").elements["OEregister_form_name"].value == "") {
			document.getElementById("OEregister").elements["OEregister_form_name_err"].value = "Name is required.";
		    	document.OEregister.OEregister_form_name.focus();
			return false;
		}
	
		return true;
	}

