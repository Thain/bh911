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
        <div class="col" style="padding-top:4em">
          <h1>Thank you<br>Leonhard.</h1>
        </div>
        <?php echo format_string_time() ?>
    </div>
    <div class="row" style="padding-left:2em">
      <h2 style="padding-top: .8em">Tutees now have access to your Zoom link until your shift ends <br>
                                    or you change it below. You can also come sign in again if you <br>
                                    have to change it.</h2>
    </div>
    <div class="row" style="padding-top: 16.3em; padding-right: 3em">
        <div class="col">
          <form autocomplete="off">
            <input type="text" id="update-link" placeholder="https://us04web.zoom.us/j/5662218874?pwd=ZlZhbHNvVDIxWC9LQmRPYTc3TjBidz09"><label for="update-link">:= (new zoom link)</label>
          </form>
        </div>
    </div>
</div>

</body>
</html>
