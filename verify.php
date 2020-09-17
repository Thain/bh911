<?php
function verify($name, $id) {
  $st = array("sidney trudeau", "119110239");
  $lc = array("liam chung", "260768747");
  $wm = array("wissam mantash", "260850682");
  $oab = array("omar abdel baky", "260868344");
  $mf = array("marco froelich", "260828878");
  $rl = array("reginald lybbert", "260847125");
  $zf = array("zachary feng", "260716865");
  $cb = array("christian bye", "260783942");
  $sz = array("sam zeitler", "260853754");
  $yz = array("yuxiu zhang", "260765321");
  $dr = array("denali relles", "260859241");
  $jh = array("jiawei hu", "260786475");

  $tutors = array($lc, $wm, $st, $oab, $mf, $rl, $zf, $cb, $sz, $yz, $dr, $jh);
  for ( $x = 0; $x <= count($tutors); $x++ ) if ( $name == $tutors[$x][0] && strval($id) == $tutors[$x][1] ) return True;
  return False;
}
?>
