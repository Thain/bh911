var d = new Date();

function setTime() {
  document.getElementById("hour").innerHTML = processHr(getHour());
  document.getElementById("min").innerHTML = processMin(d.getUTCMinutes());
  document.getElementById("ampm").innerHTML = getAMPM();
  document.getElementById("day").innerHTML = processDay(getDay());
  document.getElementById("mon").innerHTML = processMon(getMonth());
  document.getElementById("date").innerHTML = getDate().toString();
}

function getMonth(){
  if( d.getUTCDate() < getDate() ) return d.getUTCMonth() - 1
  else return d.getUTCMonth()
}
function getDay(){
  var x = d.getUTCHours()
  var y = d.getUTCDay()
  if ( x < 4 ) {
    if ( y < 1 ) return 6
    else return d.getUTCDay() - 1
  }
  else return d.getUTCDay()
}
function getDate(){
  var x = d.getUTCHours()
  var y = d.getUTCDate()
  var z = d.getUTCMonth()
  if ( x < 4 ) {
    if ( y == 1 ) return daysPrevMonth(z)
    else return d.getUTCDate() - 1
  }
  else return d.getUTCDate()
}
function getHour(){
  var x = d.getUTCHours()
  if ( x < 4 ) return x + 20
  else return (x - 4).toString()
}
function getAMPM(){
  var x = d.getUTCHours()
  if ( x < 4 ) var y = x + 20
  else var y = (x - 4)
  if ( y < 13 ) return "a.m."
  else return "p.m."
}
function processMin(min){
  if ( min > 9 ) return min.toString()
  else return "0" + min.toString()
}

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

function daysPrevMonth(month){
  let dayMap = new Map([
    [0, 31],
    [1, 31],
    [2, 28],
    [3, 31],
    [4, 30],
    [5, 31],
    [6, 30],
    [7, 31],
    [8, 31],
    [9, 30],
    [10,31],
    [11,30]
  ]);
  return dayMap.get(month)
}

function processHr(rawHr) {
  if ( rawHr > 12 ) return rawHr % 12;
  else if ( rawHr == 0 ) return 12;
  else return rawHr;
}
