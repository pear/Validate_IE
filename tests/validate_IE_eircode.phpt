--TEST--
validate_IE_eircode.phpt: Unit tests for eircode method 'Validate/IE.php'

--FILE--
<?php
// Validate test script
$noYes = array('NO', 'YES');
if (is_file(dirname(__FILE__) . '/../Validate/IE.php')) {
    require_once dirname(__FILE__) . '/../Validate/IE.php';
    $postcodes_dir = dirname(__FILE__) . '/../data';
} else {
    require_once 'Validate/IE.php';
    $postcodes_dir = null;
}

echo "Test Validate_IE\n";
echo "****************\n";

//test passport
$codes = array(
'01K-7777', // NOK - should begin with a letter
'B1K-7777', // NOK 2nd and 3rd characters should be numbers
'A11-7777', // NOK - not in file
'A45-YR50',
'Y35-A123',
'Y35-B123',
'Y35-C123',
'Y35-D123',
'Y35-E123',
'Y35-F123',
'Y35-G123',
'Y35-H123',
'Y35-I123',
'Y35-J123',
'Y35-K123',
'Y35-L123',
'Y35-M123',
'Y35-N123',
'Y35-O023',
'Y35-P023',
'Y35-Q023',
'Y35-R023',
'Y35-S123',
'Y35-T123',
'Y35-U123',
'Y35-V123',
'Y35-W123',
'Y35-X123',
'Y35-Y123',
'Y35-Z123',
);
echo "\nTest EirCodes\n";
$validator = new Validate_IE();

foreach ($codes as $code) {
    echo "{$code}: ".$noYes[$validator->eircode($code, $postcodes_dir)]."\n";
}
exit(0);
?>

--EXPECT--
Test Validate_IE
****************

Test EirCodes
01K-7777: NO
B1K-7777: NO
A11-7777: NO
A45-YR50: YES
Y35-A123: YES
Y35-B123: NO
Y35-C123: YES
Y35-D123: YES
Y35-E123: YES
Y35-F123: YES
Y35-G123: NO
Y35-H123: YES
Y35-I123: NO
Y35-J123: NO
Y35-K123: YES
Y35-L123: NO
Y35-M123: NO
Y35-N123: YES
Y35-O023: NO
Y35-P023: YES
Y35-Q023: NO
Y35-R023: YES
Y35-S123: NO
Y35-T123: YES
Y35-U123: NO
Y35-V123: YES
Y35-W123: YES
Y35-X123: YES
Y35-Y123: YES
Y35-Z123: NO
