function OEclose() {
	document.getElementById('OEmodal').style.display = "none";		
	document.getElementById('OEregister').style.display = "none";
	document.getElementById('OEmessage').style.display = "none";
	document.getElementById('OElogin').style.display = "none";
	}
function OEregister_open() {
	document.getElementById('OEmodal').style.display = "block";
	document.getElementById('OEregister').style.display = "block";
	document.getElementById('OElogin').style.display = "none";
	document.getElementById('OEmessage').style.display = "none";
	}
function OEmessage_open() {
	document.getElementById('OEmodal').style.display = "block";
	document.getElementById('OEregister').style.display = "none";
	document.getElementById('OElogin').style.display = "none";
	document.getElementById('OEmessage').style.display = "block";
	}
function OElogin_open() {
	document.getElementById('OEmodal').style.display = "block";
	document.getElementById('OEregister').style.display = "none";
	document.getElementById('OElogin').style.display = "block";
	document.getElementById('OEmessage').style.display = "none";
	}
function OEmessage(msg) {
	OEmessage_open();
	document.getElementById("OEmessage_content").innerHTML = msg;
	}

