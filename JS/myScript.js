function UserLec_enableButton() {
    if (document.getElementById("UseLec_checkBoxS").checked) {
        document.getElementById("UserLec_postBtn").disabled = false;
    } else {
        document.getElementById("UserLec_postBtn").disabled = true;
    }
}

function userProfileLec_edit() {
    window.location.href = "editLecture.php";
}

function userProfileStu_edit() {
    window.location.href = "editUserProfileStudent.php";
}

function changeDetails(btn) {
    if (btn == "btn1") {
        document.getElementById("img_centers").src = " Images/kandy.jpg";
        document.getElementById("Contact_details_centres_des").innerHTML = "Kandy Center <br><br> Contact Number : 081 1234567 <br> Email : infro@kandy.mesh.lk <br> Address : No.124, Kandy Road, Kandy";
        document.getElementById("Contact_details_centres_des").style.color = "black";
    } else if (btn == "btn2") {
        document.getElementById("img_centers").src = " Images/kurunagala.jpg";
        document.getElementById("Contact_details_centres_des").innerHTML = "Kurunagala Center <br><br> Contact Number : 037 1234567 <br> Email : infro@kurunagla.mesh.lk <br> Address : No.433, Kurunagala Road, Kandy";
        document.getElementById("Contact_details_centres_des").style.color = "black";
    } else if (btn == "btn3") {
        document.getElementById("img_centers").src = " Images/jaffna.png";
        document.getElementById("Contact_details_centres_des").innerHTML = "Jaffna Center <br><br> Contact Number : 021 1234567 <br> Email : infro@jaffna.mesh.lk <br> Address : No.231, Jaffna Road, Kandy";
        document.getElementById("Contact_details_centres_des").style.color = "black";
    } else if (btn == "btn4") {
        document.getElementById("img_centers").src = " Images/matara.jpg";
        document.getElementById("Contact_details_centres_des").innerHTML = "Matara Center <br><br> Contact Number : 041 1234567 <br> Email : infro@matara.mesh.lk <br> Address : No.321, Matara Road, Kandy";
        document.getElementById("Contact_details_centres_des").style.color = "black";
    }
}

var a = 0;

function readMore() {
    if (a == 0) {
        document.getElementById("Contact_readMore").style.display = "inline";
        document.getElementById("Contact_bnFAQ").innerHTML = "Read Less";
        a = 1;
    } else {
        document.getElementById("Contact_readMore").style.display = "none";
        document.getElementById("Contact_bnFAQ").innerHTML = "Read More";
        a = 0;
    }
}

function deleteData(id) {
    document.getElementById(id).previousElementSibling.value = "";
    document.getElementById(id).style.display = "none";
}

function makeChangesIcon(id) {
    if (document.getElementById(id).value.length > 0) {
        document.getElementById(id).nextElementSibling.style.display = "inline";
    }
}

function makeChanges(id) {
    if (id == "EditUserStu_firstName") {
        document.getElementById("legend_title1").style.color = "#00b167";
    } else if (id == "EditUserStu_middleName") {
        document.getElementById("legend_title2").style.color = "#00b167";
    } else if (id == "EditUserStu_lastName") {
        document.getElementById("legend_title3").style.color = "#00b167";
    } else if (id == "EditUserStu_Age") {
        document.getElementById("legend_title4").style.color = "#00b167";
    } else if (id == "EditUserStu_address1") {
        document.getElementById("legend_title5").style.color = "#00b167";
    } else if (id == "EditUserStu_address2") {
        document.getElementById("legend_title6").style.color = "#00b167";
    } else if (id == "EditUserStu_address3") {
        document.getElementById("legend_title7").style.color = "#00b167";
    } else if (id == "EditUserStu_city") {
        document.getElementById("legend_title8").style.color = "#00b167";
    } else if (id == "EditUserStu_country") {
        document.getElementById("legend_title9").style.color = "#00b167";
    } else if (id == "EditUserStu_email") {
        document.getElementById("legend_title10").style.color = "#00b167";
    } else if (id == "EditUserStu_phone") {
        document.getElementById("legend_title11").style.color = "#00b167";
    }
}

function makeChangesA(id) {
    if (id == "EditUserStu_firstName") {
        document.getElementById("legend_title1").style.color = "#474747";
    } else if (id == "EditUserStu_middleName") {
        document.getElementById("legend_title2").style.color = "#474747";
    } else if (id == "EditUserStu_lastName") {
        document.getElementById("legend_title3").style.color = "#474747";
    } else if (id == "EditUserStu_Age") {
        document.getElementById("legend_title4").style.color = "#474747";
    } else if (id == "EditUserStu_address1") {
        document.getElementById("legend_title5").style.color = "#474747";
    } else if (id == "EditUserStu_address2") {
        document.getElementById("legend_title6").style.color = "#474747";
    } else if (id == "EditUserStu_address3") {
        document.getElementById("legend_title7").style.color = "#474747";
    } else if (id == "EditUserStu_city") {
        document.getElementById("legend_title8").style.color = "#474747";
    } else if (id == "EditUserStu_country") {
        document.getElementById("legend_title9").style.color = "#474747";
    } else if (id == "EditUserStu_email") {
        document.getElementById("legend_title10").style.color = "#474747";
    } else if (id == "EditUserStu_phone") {
        document.getElementById("legend_title11").style.color = "#474747";
    }
}

/*Contact Page Form Validation*/

function Contact_formValidateC() {
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var message = document.getElementById("textArea_Message");

    var validate = true;

    if (name.value.length == 0) {
        name.className = "Contact_wrongInput";
        name.nextElementSibling.innerHTML = " Name can not be blank";
        validate = false;
    } else {
        name.className = "Contact_inputBox";
        name.nextElementSibling.innerHTML = "";
    }

    if (email.value.length == 0) {
        email.className = "Contact_wrongInput";
        email.nextElementSibling.innerHTML = " email can not be blank"
        validate = false;
    } else {
        email.className = "Contact_inputBox";
        email.nextElementSibling.innerHTML = "";
    }

    if (message.value.length == 0) {
        message.className = "Contact_wrongInput";
        message.nextElementSibling.innerHTML = " Message can not be blank"
        validate = false;
    } else {
        message.className = "Contact_inputBox";
        message.nextElementSibling.innerHTML = "";
    }

    return validate;
}

function Contact_formValidateF() {
    var feedback = document.getElementById("textArea_Feedback");
    var validate = true;

    if (feedback.value.length == 0) {
        feedback.className = "Contact_wrongInput";
        feedback.nextElementSibling.innerHTML = " Feedback can not be blank";
        validate = false;
    } else {
        feedback.className = "Contact_inputBox";
        feedback.nextElementSibling.innerHTML = "";
    }
    return validate;
}

function download() {
    window.open('PHP/downloadTimetable.php', '_blank');
}

function downloadLec() {
    window.open('PHP/downloadLecTimetable.php', '_blank');
}

function uploadPic() {
    document.getElementById('editUserStu_bnUp').disabled = false;
    document.getElementById('fileToUpload').click();
}

function closePop() {
    document.querySelector('.bg-modal').style.display = "none";
}

function closePopPa() {
    document.querySelector('.bg-modalPa').style.display = "none";
}

function openPop() {
    document.querySelector('.bg-modal').style.display = "flex";
}

function openPopPa() {
    document.querySelector('.bg-modalPa').style.display = "flex";
}

function closePopDel() {
    document.querySelector('.bg-modalDel').style.display = "none";
}

function openPopDel() {
    document.querySelector('.bg-modalDel').style.display = "flex";
}

function setDelete() {
    document.querySelector('.bg-modal').style.display = "none";
    document.getElementById('editUserStu_bnDel').click();
}

function setUpadate() {
    document.getElementById('editUserStu_bnSave').click();
    window.location.href = "editUserProfileStudent.php";
    document.querySelector('.bg-modal').style.display = "none";
}

function setChange() {
    var password1 = document.getElementById('password1');
    var password2 = document.getElementById('password2');

    if (password1.value == password2.value) {
        return true;
    } else {
        return false;
    }
}

function setChange1() {
    if (document.getElementById('password1').value ==
        document.getElementById('password2').value) {
        document.getElementById('EditUserStu_passwordMatch').style.color = 'green';
        document.getElementById('EditUserStu_passwordMatch').innerHTML = 'Matching';
    } else {
        document.getElementById('EditUserStu_passwordMatch').style.color = 'red';
        document.getElementById('EditUserStu_passwordMatch').innerHTML = 'Not matching';
    }
}

function hoverDropdown() {
    document.getElementById("dropDownLogOut").src = " Images/exitG.png";
}