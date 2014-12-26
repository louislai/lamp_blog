$(document).ready(function() {
    // Validation check
    $('#username').keyup(check_username);
    $('#repassword').keyup(check_password);
    $('#register').submit(function() {
        if (!validation_ok()) {
            console.log(validation_ok());
            console.log(' dfsds'+check_username());
            console.log('drwrwer'+check_password());
            event.preventDefault();
            alert("Please fix your fields to proceed");
        }
    });

});

// Check if username and password ok
function validation_ok() {

    return check_username() && check_password();
}

// Return true if username has no duplicate in database
function check_username() {
    var result;
    $.ajax({
        type: 'POST',
    url: 'models/validations/validate_account.php',
    data: {
        username: $('#username').val(),
    },
    async: false,
    cache: false,
    success: function(response) {
        if (response == 0) {
            var message = document.getElementById('checkUsername');
            message.style.color = "#66cc66";
            message.innerHTML = "Username is available";
            result = true;
        } else {
            var message = document.getElementById('checkUsername');
            message.style.color = "#ff6666";;
            message.innerHTML = "Username has duplicate in the database";
            result = false;
        }
    }

    });
    return result;
}

// Return true if password and re-password are the same
function check_password() {
    if ($('#password').val() == $('#repassword').val()) {
        var message = document.getElementById('checkPassword');
        message.style.color = "#66cc66";
        message.innerHTML = "Passwords match";
        return true;
    } else {
        var message = document.getElementById('checkPassword');
        message.style.color = "#ff6666";;
        message.innerHTML = "Passwords do not match";
        return false;

    }
}

