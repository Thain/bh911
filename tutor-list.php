<?php date_default_timezone_set('America/New_York'); include 'time.php'; include 'tutor-read.php';

function tutors_on_duty(){
  $tutors_info = read_tutors();
  return $tutors_info;
}

function tutor_code($tutor){
  return "<div class='col-4'><h3 display:inline'>" . $tutor[0] . "</h3><h3 style='display:inline'></div><div class='col-2' style='margin-bottom:2em'><h3><a target='_blank' href='" . $tutor[3] . "' class='ul'>link</a></h3></div>";
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
          <?php $tutors = tutors_on_duty(); if(count($tutors)) echo "<h1>You're in luck!<br>There are " . min(count($tutors), 4);
                                                    else echo "<h1>Sorry!<br>There are no ";
                                                    echo "<br>tutors on duty.</h1>" ?>
        </div>
        <?php echo format_string_time() ?>
    </div>
    <div class="row" style="padding-top: 8em;padding-right: 3em">
        <?php
          $tutors = tutors_on_duty();
          if(count($tutors)) for($i = 0; $i < min(count($tutors),4); $i++) echo tutor_code($tutors[$i]);
          else echo "<div class='col'><h3>You can view the tutor schedules on the <a href='https://www.facebook.com/BH911-Math-Help-Desk-111189853852809' class='ul'>Facebook page</a>.</h3></div>";
         ?>
    </div>
</div>

</body>
</html>
