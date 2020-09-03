<?php
function verify($name, $id) {
  $lc = array("liam chung", "260768747");
  $ha = array("hailey agostino", "123456789");
  $tutors = array($lc, $ha);
  for ( $x = 0; $x <= 1; $x++ ) if ( $name == $tutors[$x][0] && strval($id) == $tutors[$x][1] ) return True;
  return False;
}
?>
