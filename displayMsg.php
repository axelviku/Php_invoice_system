<?php

include_once('gen.php');
include_once('dbFunction.php');
include_once('messg.php');
$funObj2 = new general();
$funObj1 = new messages();
//This is registration page message
$error1 = $funObj1->error('Please enter all the fields carefully!!!');
$error3 = $funObj1->error('This email is already taken!!!');
$error4 = $funObj1->error('Enter Valid Phone Num!!!');
$error5 = $funObj1->error('Password contain one special character,one capital letter and not less than 5!!!');
$error6 = $funObj1->error('Registration Not Successful!!!');
$success1 = $funObj1->success('Registration Successfully done!!!');

//This is Login page  message
$error21 = $funObj1->error('Invalid email or password!!!');


?>