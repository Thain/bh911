<?php
  function read_tutors(){
    $tutor_list = explode("\n", file_get_contents('./assets/tutors.txt'));
    $tutor_info = array();
    for ($i = 0; $i < count($tutor_list); $i++ ) $tutor_info[$i] = explode("|", $tutor_list[$i]);
    array_pop($tutor_info);
    return $tutor_info;
  }

  function get_tutor_line($name){
    $tutor_file = fopen("./assets/tutors.txt", "r");
    while(true){
      if(! feof($tutor_file)) $tutor_line = fgets($tutor_file);
      else return "ERROR";
      if($name == substr($tutor_line, 0, strpos($tutor_line, '|'))) break;
    }
    fclose($tutor_file);
    return $tutor_line;
  }
?>
