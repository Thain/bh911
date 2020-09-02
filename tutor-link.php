<?php
date_default_timezone_set('America/New_York'); include 'time.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $time = $link = "";
  $timeErr = $linkErr = "";

  if ( empty($_POST["time"]) ) $timeErr = "please enter a time.";
  else $time = proc_input($_POST["time"]);

  if ( empty($_POST["link"]) ) $linkErr = "please enter a zoom link.";
  else $link = trim($_POST["link"]);

  if( $timeErr == "" && $linkErr == "" ){
    $time_for_file = $time . "\n";
    $tutor_file = fopen("./assets/tutors.txt", "a");
    fwrite("nice", $time_for_file);
    fclose($tutor_file);
    // header('Location: /tutor-link.php');
    exit();
  }
}

function proc_input($data) {
  $data = trim($data);
  $data = strtolower($data);
  return $data;
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
          <h1>Welcome back<br><?php echo ucwords($_SESSION['user']); unset($_SESSION['user']); ?>.</h1>
          <h2 style="padding-top: .8em">Your shift will begin when you press the arrow. <br> When does it end, and what is the Zoom link?</h2>
        </div>
        <?php echo format_string_time() ?>
    </div>
    <form method="POST" action="/tutor-link.php" id="inputs" autocomplete="off">
      <div class="row" style="padding-top: 4.5em; padding-right: 3em">
          <div class="col-9">
              <input type="text" id="time" name="time" placeholder="2:30"><label for="time">:= (hh:mm EST)</label> <br><br><br><br>
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
