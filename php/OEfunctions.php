<?php

  /* this file contains PHP functions shared across the site   ini_set('error_reporting', E_ERROR);  */

  function OEmail($toemail,$toname,$fromemail,$fromname,$subject,$message) {
    /* NOTE: toname is erquired but not used in the PHP function. */
    $headers =
        'Return-Path: ' . $fromemail . "\r\n" .
        'From: ' . $fromname . ' <' . $fromemail . '>' . "\r\n" .
        'X-Priority: 3' . "\r\n" .
        'X-Mailer: PHP ' . phpversion() .  "\r\n" .
        'Reply-To: ' . $fromname . ' <' . $fromemail . '>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-Transfer-Encoding: 8bit' . "\r\n" .
        'Content-Type: text/plain; charset=UTF-8' . "\r\n";
    $params = '-f ' . $fromemail;
    $test = mail($toemail, $subject, $message, $headers, $params);
    if ( $test ) {echo "Succeeded";}  else  {echo "Failed";} ;
    }
    
?>