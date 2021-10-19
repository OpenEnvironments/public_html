function OEregister_show() {
	document.getElementById('OEmodal').style.display = "block";		
	document.getElementById('OEregister-form').style.display = "block";
	document.getElementById('OEregister-result').style.display = "block";
	}
function OEregister_close() {
	document.getElementById('OEmodal').style.display = "none";		
	document.getElementById('OEregister-form').style.display = "none";
	document.getElementById('OEregister-result').style.display = "none";
	}
function OEregister_result() {
	document.getElementById('OEmodal').style.display = "block";		
	document.getElementById('OEregister-form').style.display = "none";
	document.getElementById('OEregister-result').style.display = "block";
	}
