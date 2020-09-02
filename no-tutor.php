<?php date_default_timezone_set('America/New_York'); include 'time.php'; ?>
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
        <div class="col-9" style="padding-top:4em">
          <h1>I'm sorry, there<br>are no tutors on<br>duty right now.</h1>
        </div>
        <?php echo format_string_time() ?>
    </div>
    <div class="row justify-content-between" style="padding-top: 8em; padding-left: 3em; padding-right: 3em">
        <div class="col">
          <h3>You can view the schedule of tutors on the <a href="#">Facebook page</a>.</h3>
        </div>
    </div>
</div>

</body>
</html>
