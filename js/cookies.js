// To help debug, two things:
//     create a div with id debug
//         <p id="debug"></p>
//     add this command to the javascript 
//         document.getElementById("debug").innerHTML = "HELLO WORLD";
//    


// Create cookie
function setCookie(cname, cvalue, exdays) {
document.getElementById("debug").innerHTML = "setting cookie";
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// Delete cookie
function deleteCookie(cname) {
    const d = new Date();
    d.setTime(d.getTime() + (24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=;" + expires + ";path=/";
}

// Read cookie
function getCookie(cname) {
document.getElementById("debug").innerHTML = "getting cookie";
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Set cookie consent
function acceptCookieConsent(){
document.getElementById("debug").innerHTML = "accepting cookie policy";
    deleteCookie('OE_cookie_consent1');
    setCookie('OE_cookie_consent', 1, 365);
    document.getElementById("OEcookienotice").style.display = "none";
}
function closeCookieConsent(){
    deleteCookie('OE_cookie_consent');
    setCookie('OE_cookie_consent', 1, 365);
    document.getElementById("OEcookienotice").style.display = "none";
}
