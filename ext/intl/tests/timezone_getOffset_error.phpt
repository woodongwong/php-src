--TEST--
IntlTimeZone::getOffset(): errors
--SKIPIF--
<?php
if (!extension_loaded('intl'))
	die('skip intl extension not enabled');
--FILE--
<?php
ini_set("intl.error_level", E_WARNING);

$tz = IntlTimeZone::createTimeZone('Europe/Lisbon');
var_dump($tz->getOffset(INF, true, $a, $a));

intltz_get_offset(null, time()*1000, false, $a, $a);
?>
--EXPECTF--
Warning: IntlTimeZone::getOffset(): intltz_get_offset: error obtaining offset in %s on line %d
bool(false)

Fatal error: Uncaught TypeError: intltz_get_offset() expects parameter 1 to be IntlTimeZone, null given in %s:%d
Stack trace:
#0 %s(%d): intltz_get_offset(NULL, %d, false, NULL, NULL)
#1 {main}
  thrown in %s on line %d
