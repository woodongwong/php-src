--TEST--
Test strrpos() function : usage variations - unexpected inputs for 'haystack' and 'needle' arguments
--FILE--
<?php
/* Prototype  : int strrpos ( string $haystack, string $needle [, int $offset] );
 * Description: Find position of last occurrence of 'needle' in 'haystack'.
 * Source code: ext/standard/string.c
*/

/* Test strrpos() function with unexpected inputs for 'haystack' and 'needle' arguments */

echo "*** Testing strrpos() function with unexpected values for haystack and needle ***\n";

// get an unset variable
$unset_var = 'string_val';
unset($unset_var);

// defining a class
class sample  {
  public function __toString() {
    return "object";
  }
}

//getting the resource
$file_handle = fopen(__FILE__, "r");

// array with different values
$values =  array (

  // integer values
  0,
  1,
  12345,
  -2345,

  // float values
  10.5,
  -10.5,
  10.5e10,
  10.6E-10,
  .5,

  // array values
  array(),
  array(0),
  array(1),
  array(1, 2),
  array('color' => 'red', 'item' => 'pen'),

  // boolean values
  true,
  false,
  TRUE,
  FALSE,

  // objects
  new sample(),

  // empty string
  "",
  '',

  // null values
  NULL,
  null,

  // resource
  $file_handle,

  // undefined variable
  @$undefined_var,

  // unset variable
  @$unset_var
);


// loop through each element of the array and check the working of strrpos()
$counter = 1;
for($index = 0; $index < count($values); $index ++) {
  echo "-- Iteration $counter --\n";
  $haystack = $values[$index];
  try {
    var_dump( strrpos($values[$index], $values[$index]) );
  } catch (TypeError $e) {
    echo $e->getMessage(), "\n";
  }
  try {
    var_dump( strrpos($values[$index], $values[$index], 1) );
  } catch (TypeError $e) {
    echo $e->getMessage(), "\n";
  }
  $counter ++;
}

echo "*** Done ***";
?>
--EXPECT--
*** Testing strrpos() function with unexpected values for haystack and needle ***
-- Iteration 1 --
int(0)
bool(false)
-- Iteration 2 --
int(0)
bool(false)
-- Iteration 3 --
int(0)
bool(false)
-- Iteration 4 --
int(0)
bool(false)
-- Iteration 5 --
int(0)
bool(false)
-- Iteration 6 --
int(0)
bool(false)
-- Iteration 7 --
int(0)
bool(false)
-- Iteration 8 --
int(0)
bool(false)
-- Iteration 9 --
int(0)
bool(false)
-- Iteration 10 --
strrpos() expects parameter 1 to be string, array given
strrpos() expects parameter 1 to be string, array given
-- Iteration 11 --
strrpos() expects parameter 1 to be string, array given
strrpos() expects parameter 1 to be string, array given
-- Iteration 12 --
strrpos() expects parameter 1 to be string, array given
strrpos() expects parameter 1 to be string, array given
-- Iteration 13 --
strrpos() expects parameter 1 to be string, array given
strrpos() expects parameter 1 to be string, array given
-- Iteration 14 --
strrpos() expects parameter 1 to be string, array given
strrpos() expects parameter 1 to be string, array given
-- Iteration 15 --
int(0)
bool(false)
-- Iteration 16 --
bool(false)
bool(false)
-- Iteration 17 --
int(0)
bool(false)
-- Iteration 18 --
bool(false)
bool(false)
-- Iteration 19 --
int(0)
bool(false)
-- Iteration 20 --
bool(false)
bool(false)
-- Iteration 21 --
bool(false)
bool(false)
-- Iteration 22 --
bool(false)
bool(false)
-- Iteration 23 --
bool(false)
bool(false)
-- Iteration 24 --
strrpos() expects parameter 1 to be string, resource given
strrpos() expects parameter 1 to be string, resource given
-- Iteration 25 --
bool(false)
bool(false)
-- Iteration 26 --
bool(false)
bool(false)
*** Done ***
