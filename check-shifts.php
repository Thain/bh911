<?php date_default_timezone_set('America/New_York'); include 'time.php';

  function checkTime(){
    $hour = (float) date("G");
    $min = (float) date("m");
    $on_off_file = fopen("./assets/day-onoff.txt", "r");
    $on_off = fgetc($on_off_file);
    fclose($on_off_file);
    if(($hour > 16 || $hour < 9) && $on_off == '1') endDay();
    if(($hour < 15 && $hour > 8) && $on_off == '0') startDay();
    $tutor_list = explode("\n", file_get_contents('./assets/tutors.txt'));
    foreach ($tutor_list as $tutor) checkShift($tutor, $hour, $min);
  }

  function checkShift($tutor, $curhour, $curmin){
    $pipeone = strpos($tutor, '|');
    $pipetwo = strpos($tutor, '|', $pipeone + 1);
    $pipethree = strpos($tutor, '|', $pipetwo + 1);
    $tutorhour = (float) substr($tutor, $pipeone + 1, $pipetwo - $pipeone - 1);
    $tutormin = (float) substr($tutor, $pipetwo + 1, $pipethree - $pipetwo - 1);
    if(($tutorhour == $curhour && $tutormin > $curmin) || $tutorhour > $tutormin) endShift($tutor)
  }

  function endShift($tutor){
    $tutor_file = fopen("./assets/tutors.txt", "r+");
    while(true){
      if(! feof($tutor_file))$cur_tutor = fgets($tutor_file);
      else exit();
      if($tutor == substr($cur_tutor, 0, strpos($cur_tutor, "|"))) break;
    }
    fclose($tutor_file);
    $contents = file_get_contents('./assets/tutors.txt');
    $contents = str_replace($cur_tutor, '', $contents);
    file_put_contents('./assets/tutors.txt', $contents);
  }

  function endDay(){
    $tutor_file = fopen (".assets/tutors.txt", "w");
    fclose($tutor_file);

    $on_off_file = fopen("./assets/day-onoff.txt", "w");
    fwrite($on_off_file, '0');
    fclose($on_off_file);
  }

  function startDay(){
    $on_off_file = fopen("./assets/day-onoff.txt", "w");
    fwrite($on_off_file, '1');
    fclose($on_off_file);
  }

?>
