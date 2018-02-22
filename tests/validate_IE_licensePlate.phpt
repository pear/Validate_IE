--TEST--
validate_IE_licensePlate.phpt: Unit tests for licensePlate method 'Validate/IE.php'

--FILE--
<?php
// Validate test script
$noYes = array('NO', 'YES');
require_once 'Validate/IE.php';

echo "Test Validate_IE\n";
echo "****************\n";

//test passport
$plates = array(
'ZZ-4321', //NOK
'ZZ-54321', //OK
'ZZ-7654321', //NOK
'ZV-654321', //NOK
'ZV-7258', //OK
'ZV-8192', //OK
'ZV-7654321', //NOK
'98-KY-2655', //OK
'06-D-2600', //OK
'06-DE-2600', //NOK - DE index doesn't exist
'07=KY=23233', //NOK - wrong delimiters
'121-KY-23233', //NOK - 3 digit years for 2013 and later.
'122-KY-23233', //NOK - 3 digit years for 2013 and later.
'131-KY-23233', //OK
'132-KY-23233', //OK
'133-KY-23233', //NOK - first component with 3 digits may only end with a 1 or a 2.
'06-TS-1234', // OK
'141-TS-1234', // NOK - 'TS' not issued for 2014 or after.
'98-T-1234', // NOK - 'T' is only issued for 2014 onwards
'141-T-1234', // YES
'14-KY-2655', // NOK - for 2014, the year segment should be 3 segments.
);
echo "\nTest License Plates\n";
foreach ($plates as $plate) {
    echo "{$plate}: ".$noYes[Validate_IE::licensePlate($plate)]."\n";
}
exit(0);
?>

--EXPECT--
Test Validate_IE
****************

Test License Plates
ZZ-4321: NO
ZZ-54321: YES
ZZ-7654321: NO
ZV-654321: NO
ZV-7258: YES
ZV-8192: YES
ZV-7654321: NO
98-KY-2655: YES
06-D-2600: YES
06-DE-2600: NO
07=KY=23233: NO
121-KY-23233: NO
122-KY-23233: NO
131-KY-23233: YES
132-KY-23233: YES
133-KY-23233: NO
06-TS-1234: YES
141-TS-1234: NO
98-T-1234: NO
141-T-1234: YES
14-KY-2655: NO
