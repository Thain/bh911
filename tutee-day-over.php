<?php  date_default_timezone_set('America/New_York'); include 'time.php'; ?>
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
          <h1>The Help Desk <br>
              is closed <br>
              right now. </h1>
          <h3 style="padding-top: 2em">It opens at 9 am every morning, and closes at 5. If you visit during that time, you should be directed to a page with links for tutors on duty.</h3>
        </div><?php echo format_string_time() ?></div>
    </div>
</div>

</body>
</html>
