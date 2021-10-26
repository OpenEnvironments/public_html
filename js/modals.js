var OEregistermodal   = document.getElementById("OEregister-modal");
var OEregisteropen    = document.getElementById("OEregister-open");
var OEregisterclose   = document.getElementById("OEregister-close");

OEregisteropen.onclick = function() {
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

