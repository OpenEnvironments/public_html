<php?

echo '
<div id="cookieNotice" class="OEcookienotice"> 
	<div class="OEcookienotice_close">
		<button type="button" class="OEcookienotice_close" onclick="closeCookieConsent();">
		&times;</button>
	</div>
	<div class="OEcookienotice_title">Cookie Consent<br></div>
	<div class="OEcookienotice_msg">
		This website uses cookies for site analytics and to personalize your experience. 
		By continuing to use our website, you agree to our 
			<a href="privacy-policy.php">Privacy Policy</a> and 
			<a href="cookies-policy.php">Cookies Policy</a>.
	</div>
	<div class="OEcookienotice_accept">
		<button type="button" class="OEcookienotice_accept" onclick="acceptCookieConsent();">Accept</button>
	</div>
</div>
';

?>

