function verify (origname, origid) {
    const lc = ["liamchung", "260768747"]
    const ha = ["haileyagostino", "123456789"]
    const tutors = [lc, ha]

    newName = origname.toLowerCase().replace(/[-]/g, '').replace(/ /g,'');
    newId = origid.toLowerCase().replace(/[-]/g, '').replace(/ /g,'');

    for (i = 0; i < 2; i++) if ( newName == tutors[i][0] && newId == tutors[i][1] ) return true;
    return false;
    // var form = document.getElementById("inputs")
    // var name = inputs.name.value;
    // var id = inputs.id.value;
    // if(name == "liam") {
    //   window.location.replace("/tutor-link")


    // var password = document.getElementById("password");
    // var confirm_password = document.getElementById("password_confirm");

    // return password.value !== "" && password.value === confirm_password.value;
       //       not empty       and              equal
}
