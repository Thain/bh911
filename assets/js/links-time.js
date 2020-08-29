// var tutorLink = document.getElementById('tutor-link');
// var tuteeLink = document.getElementById('tutee-link');
// yourElement.setAttribute('href', '#url');
//
// getFullYear()	YYYY	                     1970
// Month	getMonth()	0-11                 	0 =January
// Day (of the month)	getDate()	1-31      	1 = 1st of the month
// Day (of the week)	getDay()                	0-6	0 = Sunday
// Hour	getHours()	0-23	                     0 = midnight
// Minute	getMinutes()	0-59

function tick() {
  //get the mins of the current time
  var mins = new Date().getMinutes();
  if (mins == "00") {
    alert('Do stuff');
  }
  console.log('Tick ' + mins);
}

setInterval(tick, 1000*60);
