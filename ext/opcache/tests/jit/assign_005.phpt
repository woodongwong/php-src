--TEST--
JIT ASSIGN: 005
--INI--
opcache.enable=1
opcache.enable_cli=1
opcache.file_update_protection=0
opcache.jit_buffer_size=1M
;opcache.jit_debug=257
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
function foo() {
	$a = array();
	$b = $a;
	$c = array();
	$d = $c;
	$a = 1;
	$c = $a;
	return $c;
}
var_dump(foo());
--EXPECT--
int(1)
