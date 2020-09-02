function verify (origname, origid) {
    const lc = ["liamchung", "260768747"]
    const ha = ["haileyagostino", "123456789"]
    const tutors = [lc, ha]

    newName = origname.toLowerCase().replace(/[-]/g, '').replace(/ /g,'');
    newId = origid.toLowerCase().replace(/[-]/g, '').replace(/ /g,'');

    for (i = 0; i < 2; i++) if ( newName == tutors[i][0] && newId == tutors[i][1] ) return true;
    return false;
}
