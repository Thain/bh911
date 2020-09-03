<?php date_default_timezone_set('America/New_York'); include 'time.php'; include 'tutor-read.php';

  function checkTime(){
    $hour = (float) date("G");
    $min = (float) date("i");
    $on_off_file = fopen("./assets/day-onoff.txt", "r");
    $on_off = fgetc($on_off_file);
    fclose($on_off_file);
    if(($hour > 16 || $hour < 9) && $on_off == '1') endDay();
    if(($hour < 15 && $hour > 8) && $on_off == '0') startDay();

    $tutor_info = read_tutors();
    foreach ($tutor_info as $tutor) {
      $tutor_name = $tutor[0];
      $tutor_hour = (float) $tutor[1];
      $tutor_min = (float) $tutor[2];
      checkShift($tutor_name, $tutor_hour, $tutor_min, $hour, $min);
    }
  }

  function checkShift($tutor_name, $tutor_hour, $tutor_min, $cur_hour, $cur_min){
    if(($tutor_hour == $cur_hour && $cur_min > $tutor_min) || $cur_hour > $tutor_hour) endShift($tutor_name);
  }

  function endShift($tutor_name){
    $tutor = get_tutor_line($tutor_name);
    $contents = file_get_contents('./assets/tutors.txt');
    $contents = str_replace($tutor, '', $contents);
    file_put_contents('./assets/tutors.txt', $contents);
  }

  function endDay(){
    $tutor_file = fopen ("./assets/tutors.txt", "w");
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
