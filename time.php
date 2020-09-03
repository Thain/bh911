<?php
date_default_timezone_set('America/New_York');

function format_string_time(){
  return "<div class='col-3' style='padding-top:8em'><h4 style='text-align:right'>" . string_time() . "</div>";
}

function format_string_time_middle(){
  return "<div class='col-6'><h4 style='text-align:right'>" . string_time_middle() . "</div>";
}

function format_string_time_mobile(){
  return "<div class='col' style='padding-top:10em'><h4 style='text-align:left; font-size: 7em'>" . string_time_mobile() . "</div>";
}

function string_time() {
  return "It's " . date("h:i a") . " EST<br>" . format_date() . ".<br>" . "<a class='ul' href='/about.php'>help/about.</a><br><a class='ul' href='/'>home.</a></h4>";
}

function string_time_middle() {
  return "It's " . date("h:i a") . " EST. <br> " . format_date() . "<br>" . "<a class='ul' href='/about.php'>help/about.</a><br><a class='ul' href='/'>home.</a></h4>";
}

function string_time_mobile() {
  return "It's " . date("h:i a") . " EST. <br> " . format_date() . "<br>" . "<a class='ul' href='/about.php'>help/about.</a><br><a class='ul' href='/'>home.</a></h4>";
}

function format_date(){
  $day = processDay(date("l"));
  $month = processMon(date("m"));
  $date = date("d");
  return $day . " " . $month . " " . $date;
}

function processMon($month){
  $monthMap = [
    "01" => "jan.",
    "02" => "feb.",
    "03" => "mar.",
    "04" => "apr.",
    "05" => "may",
    "06" => "jun.",
    "07" => "jul.",
    "08" => "aug.",
    "09" => "sep.",
    "10" => "oct.",
    "11" => "nov.",
    "12" => "dec."
  ];
  return $monthMap[$month];
}

function processDay($day){
  $dayMap = [
    "Sunday" => "sun.",
    "Monday" => "mon.",
    "Tuesday" => "tue.",
    "Wednesday" => "wed.",
    "Thursday" => "thu.",
    "Friday" => "fri.",
    "Saturday" => "sat."
  ];
  return $dayMap[$day];
}

 ?>
