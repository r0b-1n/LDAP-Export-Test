<?php

// LDAP-Elemente zur Authentifizierung
$ldaprdn  = 'cn=read-only-admin,dc=example,dc=com';     // LDAP-RDN oder -DN
$ldappass = 'password';  // entsprechendes Passwort

// Verbinden mit dem LDAP-Server
$ldapconn = ldap_connect("ldap://ldap.forumsys.com/")
    or die("Keine Verbindung zum LDAP-Server möglich.");

ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

if ($ldapconn) {

    // Anmelden am LDAP-Server (ans LDAP-Verzeichnis binden)
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // Überprüfung der Authentifizierung
    if ($ldapbind) {
        echo "LDAP Bind erfolgreich...";
    } else {
        echo "LDAP Bind fehlgeschlagen...";
    }

}

?>