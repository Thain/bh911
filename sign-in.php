<?php
date_default_timezone_set('America/New_York'); include 'time.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $id = "";
  $nameErr = $idErr = "";

  if ( empty($_POST["name"]) ) $nameErr = "please enter a name.";
  else $name = proc_input($_POST["name"]);

  if ( empty($_POST["id"]) ) $idErr = "please enter a student i.d.";
  else $id = proc_input($_POST["id"]);

  if( $nameErr == "" && $idErr == "" && verify($name, $id) ){
    $fname = substr($name, 0, strrpos($name, " "));
    $tutor_file = fopen("./assets/tutors.txt", "a");
    fwrite($tutor_file, $fname . "\n");
    fclose($tutor_file);

    $_SESSION['user'] = $fname;

    header('Location: /tutor-link.php');
    exit();
  }
}

function proc_input($data) {
  $data = trim($data);
  $data = strtolower($data);
  return $data;
}

function verify($name, $id) {
  $lc = array("liam chung", "260768747");
  $ha = array("hailey agostino", "123456789");
  $tutors = array($lc, $ha);
  for ( $x = 0; $x <= 1; $x++ ) if ( $name == $tutors[$x][0] && strval($id) == $tutors[$x][1] ) return True;
  return False;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/fonts.css">
  <link rel="stylesheet" href="./assets/css/screen-sizes.css">
  <script language="JavaScript">
    function AutoRefresh( t ) {
             setTimeout("location.reload(true);", t);
    }
  </script>

</head>
<body onload="JavaScript:AutoRefresh(60000);">
<!-- Header -->
<div class="container-fluid" style="background-color: white; height: 100vh; padding-left: 5vw; padding-right:5vw">
      <div class="row justify-content-center">
          <div class="col-9" style="padding-top:4em">
            <h1>Please sign<br>in here:</h1>
          </div>
          <?php echo format_string_time() ?>
      </div>
    <form method="POST" action="/sign-in.php" id="inputs" autocomplete="off">
        <div class="row" style="padding-top: 17em; padding-right: 3em">
            <div class="col-9">
                <input type="text" id="name" name="name" placeholder="Leonhard Euler"><label for="name">:= (first, last)</label> <br><br><br><br>
                <input type="text" id="id" name="id" placeholder="271828182"><label for="id">:= (student id.)</label>
            </div>
            <div class="col-3 align-self-center" style="height:22em">
              <input TYPE="submit" NAME="button" value="">
            </div>
        </div>
    </form>
</div>

</body>
</html>
