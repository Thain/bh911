var d = new Date();
var mon = processMon(d.getMonth());
var date = d.getDate();
var day = processDay(d.getDay());
var hr = processHr(d.getHours());
var ampm = processAMPM(d.getHours());
var min = d.getMinutes();

function setTime() {
  document.getElementById("hour").innerHTML = hr.toString();
  document.getElementById("min").innerHTML = min.toString();
  document.getElementById("ampm").innerHTML = ampm;
  document.getElementById("day").innerHTML = day;
  document.getElementById("mon").innerHTML = mon;
  document.getElementById("date").innerHTML = date.toString();
}

function getDay(){ return d.getDay() }
function getHour(){ return d.getHours() }
function getMin(){ return d.getMinutes() }

function processMon(month){
  let monthMap = new Map([
    [0, "jan."],
    [1, "feb."],
    [2, "mar."],
    [3, "apr."],
    [4, "may"],
    [5, "jun."],
    [6, "jul."],
    [7, "aug."],
    [8, "sep."],
    [9, "oct."],
    [10, "nov."],
    [11,"dec."]
  ]);
  return monthMap.get(month)
}

function processDay(day){
  let dayMap = new Map([
    [0, "sun."],
    [1, "mon."],
    [2, "tue."],
    [3, "wed."],
    [4, "thu."],
    [5, "fri."],
    [6, "sat."]
  ]);
  return dayMap.get(day)
}

function processAMPM(rawHr) {
  if ( rawHr < 13 ) return "a.m."
  else return "p.m."
}

function processHr(rawHr) {
  if ( rawHr > 12 ) return rawHr % 12;
  else if ( rawHr == 0 ) return 12;
  else return rawHr;
}
