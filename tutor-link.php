<?php
date_default_timezone_set('America/New_York'); include 'time.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $time = $link = "";

  $input_time = proc_time(proc_input($_POST["time"]));
  if ( empty($_POST['time']) ) { header("Location:" . $_SERVER['PHP_SELF'] . "?x=1"); exit(); }
  else if ( !valid_time($input_time) ) { header("Location:" . $_SERVER['PHP_SELF'] . "?x=2"); exit(); }
  else if ( !time_open($input_time) ) { header("Location:" . $_SERVER['PHP_SELF'] . "?x=3"); exit(); }
  else if ( time_passed($input_time) ) { header("Location:" . $_SERVER['PHP_SELF'] . "?x=4"); exit(); }
  else $time = $input_time;
  
  if ( empty($_POST["link"]) ){ header("Location:" . $_SERVER['PHP_SELF'] . "?x=5"); exit(); }
  else $link = trim($_POST["link"]);

  $name = $_SESSION['name'];
  $hour = $time[0];
  $min = $time[1];
  $tutor_file = fopen("./assets/tutors.txt", "a");
  $string_to_write = $name . "|" . $hour . "|" . $min . "|" . $link . "\n";
  fwrite($tutor_file, $string_to_write);
  fclose($tutor_file);
  header('Location: /update-link.php');
  exit();
}

function proc_input($data) {
  $data = trim($data);
  $data = strtolower($data);
  return $data;
}

function proc_time($time) {
  $time_array = array(["", ""]);
  $time_array =  explode(":", $time);
  if ( $time_array[1] == "") $time_array[1] = "0";
  if ( ! is_numeric($time_array[0]) ||  ! is_numeric($time_array[1]) ) return array([-1,-1]);
  if(floatval($time_array[0]) < 6) {
    $hr = $time_array[0];
    $hr += 12;
    $time_array[0] = strval($hr);
  }
  return $time_array;
}

function valid_time($time){
  if ( $time[0] < 1 ||  $time[0] > 23) return False;
  if ( $time[1] < 0 ||  $time[1] > 59) return False;
  return True;
}

function time_open($time){
  if ( $time[0] < 9 ||  $time[0] > 16 ) return False;
  return True;
}

function time_passed($time){
  $cur_hour = (float) date("G");
  $cur_min = (float) date("i");
  $tutor_hour = (float) $time[0];
  $tutor_min = (float) $time[1];
  if(($tutor_hour == $cur_hour && $cur_min > $tutor_min) || $cur_hour > $tutor_hour) return True;
  return False;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/fonts.css">
  <link rel="stylesheet" href="../assets/css/screen-sizes.css">
</head>
<body>

<!-- Header -->
<div class="container-fluid" style="background-color: white; height: 100vh; padding-left: 5vw; padding-right:5vw">
    <div class="row justify-content-center">
        <div class="col" style="padding-top:4em">
          <h1>Welcome back<br><?php echo ucwords($_SESSION['name']); ?>.</h1>
          <h2 style="padding-top: .8em">Your shift will begin when you press the arrow. <br> When does it end, and what is the Zoom link?</h2>
        </div>
        <?php echo format_string_time(); ?>
    </div>
    <form method="POST" action="/tutor-link.php" id="inputs" autocomplete="off">
      <div class="row" style="padding-top: 4.5em; padding-right: 3em">
          <div class="col-9">
              <input type="text" id="time" name="time" placeholder="2:30" style="margin-bottom:5px"><label for="time">:= (hh:mm EST)</label>
              <br><?php if($_GET['x'] == 1) echo "<h3 style='font-size:3em'> Please enter a time. </h3>";
                    else if($_GET['x'] == 2) echo "<h3 style='font-size:3em'> Please enter a valid time. </h3>";
                    else if($_GET['x'] == 3) echo "<h3 style='font-size:3em'> Please enter a time when the help desk is open. </h3>";
                    else if($_GET['x'] == 4) echo "<h3 style='font-size:3em'> Please enter a time that hasn't passed yet today. </h3>";
                    else if($_GET['x'] == 5) echo "<h3 style='font-size:3em'> Please enter a zoom link. </h3>";
                    else echo "<br>"
              ?>
              <br>
              <input type="text" id="link" name="link" placeholder="https://us04web.zoom.us/j/5662218874?pwd=ZlZhbHNvVDIxWC9LQmRPYTc3TjBidz09"><label for="link">:= (zoom link)</label>
          </div>
          <div class="col-3 align-self-center" style="height:22em">
              <input TYPE="submit" NAME="button" value="">
          </div>
      </div>
    </form>
</div>

</body>
</html>
