<?php date_default_timezone_set('America/New_York'); include 'time.php'; include 'tutor-read.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $new_link = "";

  if ( empty($_POST["link"]) ) { header("Location:/update-link.php?x=1"); exit(); }
  else $new_link = trim($_POST["link"]);

  $name = $_SESSION['name'];
  $tutor_line = get_tutor_line($name);

  $line_to_write = substr($tutor_line, 0, strpos($tutor_line, "|", strpos($tutor_line, "|", strpos($tutor_line, "|") + 1) + 1) + 1) . $new_link . "\n";

  $contents = file_get_contents('./assets/tutors.txt');
  $contents = str_replace($tutor_line, $line_to_write, $contents);
  file_put_contents('./assets/tutors.txt', $contents);

  header('Location: /update-link.php?x=0');
  exit();
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
          <h1>Thank you<br><?php echo ucwords($_SESSION['name']); ?>.</h1>
        </div>
        <?php echo format_string_time() ?>
    </div>
    <div class="row" style="padding-left:2em">
      <h2 style="padding-top: .8em">Tutees now have access to your Zoom link until your shift ends <br>
                                    or you change it below. You can also come sign in again if you <br>
                                    have to change it.</h2>
    </div>
    <form method="POST" action="/update-link.php" id="inputs" autocomplete="off">
      <div class="row" style="padding-top: 5.3em; padding-right: 3em">
          <div class="col-9">
              <input type="text" id="link" name="link" placeholder="https://us04web.zoom.us/j/5662218874?pwd=ZlZhbHNvVDIxWC9LQmRPYTc3TjBidz09" style="margin-bottom:5px"><label for="link">:= (new zoom link)</label>
              <br><?php if($_GET['x'] == 1) echo "<h3 style='font-size:3em'> Please enter a zoom link. </h3>";?>
          </div>
          <div class="col-3" style="height:22em">
              <input TYPE="submit" NAME="button" value="">
          </div>
      </div>
    </form>
</div>

</body>
</html>
