<?php
function verify($name, $id) {
  $lc = array("liam chung", "260768747");
  $dp = array("dominic petti", "260762938");
  $tutors = array($lc, $dp);
  for ( $x = 0; $x <= 1; $x++ ) if ( $name == $tutors[$x][0] && strval($id) == $tutors[$x][1] ) return True;
  return False;
}
?>
