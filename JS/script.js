function loadData(name) {
    if (name == 'btn1') {
        document.getElementById("admin-timetable").src = "timetables/Capture.JPG";
        document.getElementById("admin-timetable-title").innerHTML = "Year 1 Semester 1";
    } else if (name == 'btn2') {
        document.getElementById("admin-timetable").src = "timetables/Capture1.jpg";
        document.getElementById("admin-timetable-title").innerHTML = "Year 1 Semester 2";
    } else if (name == 'btn3') {
        document.getElementById("admin-timetable").src = "timetables/Capture2.jpg";
        document.getElementById("admin-timetable-title").innerHTML = "Year 2 Semester 1";
    } else if (name == 'btn4') {
        document.getElementById("admin-timetable").src = "timetables/Capture3.jpg";
        document.getElementById("admin-timetable-title").innerHTML = "Year 2 Semester 2";
    } else if (name == 'btn5') {
        document.getElementById("admin-timetable").src = "timetables/Capture4.jpg";
        document.getElementById("admin-timetable-title").innerHTML = "Year 3 Semester 1";
    } else if (name == 'btn6') {
        document.getElementById("admin-timetable").src = "timetables/Capture5.jpg";
        document.getElementById("admin-timetable-title").innerHTML = "Year 3 Semester 2";
    } else if (name == 'btn7') {
        document.getElementById("admin-timetable").src = "timetables/Capture3.jpg";
        document.getElementById("admin-timetable-title").innerHTML = "Year 4 Semester 1";
    } else if (name == 'btn8') {
        document.getElementById("admin-timetable").src = "timetables/Capture4.jpg";
        document.getElementById("admin-timetable-title").innerHTML = "Year 4 Semester 2";
    }


}



function validateStudentUpdate() {
    var fName = document.getElementById('fName').value;
    var mName = document.getElementById('mName').value;
    var lName = document.getElementById('lName').value;
    var age = document.getElementById('age').value;
    var sID = document.getElementById('sID').value;
    var pw = document.getElementById('pw').value;


    var eMail = document.getElementById('eMail').value;
    var addrL1 = document.getElementById('addrL1').value;
    var addrL2 = document.getElementById('addrL2').value;
    var addrL3 = document.getElementById('addrL3').value;
    var city = document.getElementById('city').value;
    var Country = document.getElementById('Country').value;
    var pNum = document.getElementById('pNum').value;


    if (fName == '' || mName == '' || lName == '' || age == '' || sID == '' || pw == '' || pNum == '' || Country == '' || city == '' || addrL1 == '' || addrL2 == '' || addrL3 == '') {
        alert("All the fields are required");
        return false;
    }

    if (age < 0 && age > 100) {
        alert("Invalid input for age");
        return false;
    }
    if (pNum < 10) {
        alert("Phone number is invalid");
        return false;
    } else {
        return true;
    }

}

function validateLecturerInsertPage() {

    var LecID = document.getElementById('LecID').value;
    var Lecname = document.getElementById('Lecname').value;
    var LecAge = document.getElementById('LecAge').value;
    var LecEmail = document.getElementById('LecEmail').value;
    var LecPhoneNumber = document.getElementById('LecPhoneNumber').value;

    if (LecID == '' || Lecname == '' || LecAge == '' || LecEmail == '') {
        alert("All the fields are required");
        return false;
    } else if (LecAge < 0 || LecAge > 100) {
        alert("Invalid input for age");
        return false;
    } else if (LecPhoneNumber < 10) {
        alert("Phone number is invalid");
        return false;
    } else {
        return true;
    }


}