<?php

$pswsignup="1234";
$hashpws= password_hash($pswsignup, PASSWORD_DEFAULT);

var_dump($hashpws);

/* I AM DONE WITH SIGN UP LOGIN */

/* ON LOGIN */

$pswsignup = "134";

IF(password_verify($pswsignup,$hashpws)){

    PRINT ("LOGIN OK");

}
else {
    PRINT("NOT OK
    ")
}