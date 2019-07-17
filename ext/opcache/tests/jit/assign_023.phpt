--TEST--
JIT ASSIGN: 023
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
	$a = array(1);
	$a = $undef;
	for($i=0; $i<6; $i++) {
		$undef = 1;
	}
}
foo();
echo "ok\n";
--EXPECTF--
Notice: Undefined variable: undef in %s on line %d
ok
