function validate() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value

    if (username == '') {
        alert("Please fill the User name feild");
        return false;
    }
    if (password == '') {
        alert("Please fill the Password feild");
        return false;
    }

}