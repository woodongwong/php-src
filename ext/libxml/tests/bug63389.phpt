--TEST--
Bug #63389 (Missing context check on libxml_set_streams_context() causes memleak)
--SKIPIF--
<?php if (!extension_loaded('libxml')) die('skip'); ?>
--FILE--
<?php
$fp = fopen("php://input", "r");
libxml_set_streams_context($fp);
try {
    libxml_set_streams_context("a");
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}
echo "okey";
?>
--EXPECT--
libxml_set_streams_context() expects parameter 1 to be resource, string given
okey
