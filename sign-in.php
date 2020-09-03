<?php
date_default_timezone_set('America/New_York'); include 'time.php'; include 'verify.php'; include 'tutor-read.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $id = "";

  if ( empty($_POST["name"]) ) { header("Location:" . $_SERVER['PHP_SELF'] . "?x=1"); exit(); }
  else $fullname = proc_input($_POST["name"]);

  if ( empty($_POST["id"]) ) { header("Location:" . $_SERVER['PHP_SELF'] . "?x=1"); exit(); }
  else $id = proc_input($_POST["id"]);

  if(  verify($fullname, $id) ){
    $_SESSION['name'] = substr($fullname, 0, strpos($fullname, " "));
    if(tutor_on_duty($_SESSION['name'])){
      header('Location: /update-link.php');
      exit();
    }
    else{
      header('Location: /tutor-link.php');
      exit();
    }
  }
  else header('Location: /sign-in.php?x=1');
}

function proc_input($data) {
  $data = trim($data);
  $data = strtolower($data);
  return $data;
}

function tutor_on_duty($name){
  $tutors = read_tutors();
  foreach ($tutors as $tutor) if($tutor[0] == $name) return True;
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
                <input type="text" id="name" name="name" placeholder="Leonhard Euler" style="margin-bottom:5px"><label for="name">:= (first, last)</label>
                <br><?php if($_GET['x'] == 1) echo "<h3 style='font-size:3em'> Your name and id were not recognized as a tutor. </h3>";
                      else echo "<br>"
                ?>
                <br>
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
