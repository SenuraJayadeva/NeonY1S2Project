function validate() {
    var fName = document.getElementById('fName').value;
    var mName = document.getElementById('mName').value;
    var lName = document.getElementById('lName').value;
    var age = document.getElementById('age').value;
    var gender = document.getElementById('gender').value;
    var faculty = document.getElementById('faculty').value;
    var year = document.getElementById('year').value;
    var group = document.getElementById('group').value;

    var sID = document.getElementById('sID').value;
    var pw = document.getElementById('pw').value;
    var Rpw = document.getElementById('Rpw').value;

    var eMail = document.getElementById('eMail').value;
    var addrL1 = document.getElementById('addrL1').value;
    var addrL2 = document.getElementById('addrL2').value;
    var addrL3 = document.getElementById('addrL3').value;
    var city = document.getElementById('city').value;
    var Country = document.getElementById('Country').value;
    var pNum = document.getElementById('pNum').value;


    if (fName == '') {
        alert("Please fill the first name feild");
        return false;
    }
    if (mName == '') {
        alert("Please fill the middle name feild");
        return false;
    }
    if (lName == '') {
        alert("Please fill the last name feild");
        return false;

    }
    if (age == '') {
        alert("Please fill the age feild");
        return false;

    }
    if (sID == '') {
        alert("Please fill the Student/EmployeeID feild");
        return false;

    }
    if (pw == '') {
        alert("Please fill the Password feild");
        return false;

    }
    if (Rpw == '') {
        alert("Please fill the Re-type Password feild");
        return false;

    }

    if (pNum == '') {
        alert("Please fill the Phone number feild");
        return false;
    }

    if (Country == '') {
        alert("Please fill the Country feild");
        return false;
    }

    if (city == '') {
        alert("Please fill the city feild");
        return false;
    }

    if (addrL3 == '') {
        alert("Please fill the address 3 feild");
        return false;

    }
    if (addrL2 == '') {
        alert("Please fill the address 2 feild");
        return false;

    }
    if (addrL1 == '') {
        alert("Please fill the address 1 feild");
        return false;

    }

    if (age < 0 && age > 100) {
        alert("Invalid input for age");
        return false;
    }
    if (pNum.length != 10) {
        alert("Phone number is invalid");
        return false;
    } else {
        window.open("Conformation.html")
        return true;
    }

}

function checkPassword() {
    if (document.getElementById("pw").value != document.getElementById("Rpw").value) {
        alert("Password Mismatch!");
        return false;
    } else {
        alert("Success!");
        return true;
    }
}

function enableButton() {
    if (document.getElementById("checkBox").checked) {
        document.getElementById("btnSubmit").disabled = false;
    } else {
        document.getElementById("btnSubmit").disabled = true;
    }
}


function active(id) {
    if (id == "fName") {
        document.getElementById("fName").style.border = "1px solid #00b167";
    } else if (id == "mName") {
        document.getElementById("mName").style.border = "1px solid #00b167";
    } else if (id == "lName") {
        document.getElementById("lName").style.border = "1px solid #00b167";
    } else if (id == "age") {
        document.getElementById("age").style.border = "1px solid #00b167";
    } else if (id == "gender") {
        document.getElementById("gender").style.color = "#00b167";
    } else if (id == "faculty") {
        document.getElementById("faculty").style.border = "1px solid #00b167";
    } else if (id == "year") {
        document.getElementById("year").style.border = "1px solid #00b167";
    } else if (id == "group") {
        document.getElementById("group").style.border = "1px solid #00b167";
    } else if (id == "sID") {
        document.getElementById("sID").style.border = "1px solid #00b167";
    } else if (id == "pw") {
        document.getElementById("pw").style.border = "1px solid #00b167";
    } else if (id == "Rpw") {
        document.getElementById("Rpw").style.border = "1px solid #00b167";
    } else if (id == "eMail") {
        document.getElementById("eMail").style.border = "1px solid rgb(102, 255, 204)";
    } else if (id == "addrL1") {
        document.getElementById("addrL1").style.border = "1px solid rgb(102, 255, 204)";
    } else if (id == "addrL2") {
        document.getElementById("addrL2").style.border = "1px solid rgb(102, 255, 204)";
    } else if (id == "addrL3") {
        document.getElementById("addrL3").style.border = "1px solid rgb(102, 255, 204)";
    } else if (id == "city") {
        document.getElementById("city").style.border = "1px solid rgb(102, 255, 204)";
    } else if (id == "Country") {
        document.getElementById("Country").style.border = "1px solid rgb(102, 255, 204)";
    } else if (id == "pNum") {
        document.getElementById("pNum").style.border = "1px solid rgb(102, 255, 204)";
    }
}

function inactive(id) {
    if (id == "gender") {
        document.getElementById("gender").style.color = "#000000";
    }
}


function openProf() {
    document.getElementById("Prof").style.width = "100%";
}

function closeProf() {
    document.getElementById("Prof").style.width = "0%";
}