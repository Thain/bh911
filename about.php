<?php date_default_timezone_set('America/New_York'); include 'time.php'; include 'tutor-read.php'; ?>
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
        <div class="col" style="padding-top:4em">
          <h1 style="font-size: 13em">This website was made
              on short time and
              for no money.</h1>
        </div>
        <?php echo format_string_time() ?>
    </div>
    <div class="row"><div class="col">
      <h3 style="padding-top: 1em">My apologies if there are any issues with it;
                                    I'd appreciate it if you let me know
                                    about any issues though. You can reach me
                                    on Facebook (Liam Chung), or at lwalkerchung@gmail.com.</h3>
    </div></div>
</div>

</body>
</html>
