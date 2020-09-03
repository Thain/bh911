<?php date_default_timezone_set('America/New_York'); include 'check-shifts.php';

function check_day(){
  $on_off_file = fopen("./assets/day-onoff.txt", "r");
  $on_off = fgetc($on_off_file);
  fclose($on_off_file);
  return $on_off;
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
<div class="hide-mobile">
  <div class="container-fluid" style="background-color: white; height: 100vh; padding-left: 5vw; padding-right:5vw">
      <div class="row"><div class="col-9" style="padding-top:4em">
            <h1>Welcome to the<br>Burnside 911<br>Math Help Desk.</h1>
      </div><?php echo format_string_time() ?></div>

      <div class="row" style="padding-top: 16em; padding-left: 3em; padding-right: 3em">
          <div class="col-4">
            <h3><a id='tutor-link' href='<?php  $on_off = check_day();
                                                if($on_off) echo "/sign-in.php";
                                                else echo "/tutor-day-over.php"; ?>'>I'm a tutor</a></h3>
          </div>
          <div class="col-5 offset-2">
            <h3><a id='tutee-link' href='<?php  $on_off = check_day();
                                                if($on_off) echo "/tutor-list.php";
                                                else echo "/tutee-day-over.php"; ?>'>I'm seeking a tutor</a></h3>
          </div>
      </div>
  </div>
</div>

<div class="show-middle">
  <div class="container-fluid" style="background-color: white; height: 100vh; padding-left: 5vw; padding-right:5vw">
      <div class="row"><div class="col" style="padding-top:4em">
            <h1>Welcome to the Burnside 911 <br>Math Help Desk.</h1>
      </div></div>

      <div class="row" style="padding-top: 16em; padding-left: 3em; padding-right: 3em">
          <div class="col-6">
            <h3 style='margin-bottom:1em'><a id='tutor-link' href='<?php  $on_off = check_day();
                                                if($on_off) echo "/sign-in.php";
                                                else echo "/tutor-day-over.php"; ?>'>I'm a tutor</a></h3>
            <h3><a id='tutee-link' href='<?php  $on_off = check_day();
                                                if($on_off) echo "/tutor-list.php";
                                                else echo "/tutee-day-over.php"; ?>'>I'm seeking a tutor</a></h3>
          </div>
          <?php echo format_string_time_middle() ?>

      </div>
  </div>
</div>

<div class="show-mobile">
  <div class="container-fluid" style="background-color: white; height: 100vh; padding-left: 5vw; padding-right:5vw">
      <div class="row"><div class="col" style="padding-top:4em">
            <h1>Welcome to the Burnside 911 <br>Math Help Desk.</h1>
      </div></div>

      <div class="row">
        <?php echo format_string_time_mobile() ?>
      </div>

      <div class="row" style="padding-top: 16em; padding-right: 3em">
          <div class="col">
            <h3 style='margin-bottom:1em; font-size:8em'><a id='tutor-link' href='<?php  $on_off = check_day();
                                                if($on_off) echo "/sign-in.php";
                                                else echo "/tutor-day-over.php"; ?>'>I'm a tutor</a></h3>
            <h3 style='font-size:8em'><a id='tutee-link' href='<?php  $on_off = check_day();
                                                if($on_off) echo "/tutor-list.php";
                                                else echo "/tutee-day-over.php"; ?>'>I'm seeking a tutor</a></h3>
          </div>

      </div>
  </div>
</div>
</body>

</body>
</html>
