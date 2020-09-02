// var tutorLink = document.getElementById('tutor-link');
// var tuteeLink = document.getElementById('tutee-link');
// yourElement.setAttribute('href', '#url');


function checkShifts() {
  //get the mins of the current time
  var mins = new Date().getMinutes();
  if (mins == "00") {
    alert('Do stuff');
  }
  console.log('Tick ' + mins);
}

// // Run every 30 minutes
// setInterval(checkShifts, 1000*60*30);
