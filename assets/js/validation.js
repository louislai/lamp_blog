$(document).ready(function() {
    // Validation check
    $('#username').keyup(check_username);
    $('#repassword').keyup(check_password);
    $('#register').submit(function() {
        if (!validation_ok()) {
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
    $.ajax({
        type: 'POST',
    url: 'models/validations/validate_account.php',
    data: {
        username: $('#username').val(),
    },
    cache: false,
    success: function(response) {
        if (response == 0) {
            console.log(response);
            var message = document.getElementById('checkUsername');
            message.style.color = "#66cc66";
            message.innerHTML = "Username is available";
            return true;
        } else {
            var message = document.getElementById('checkUsername');
            message.style.color = "#ff6666";;
            message.innerHTML = "Username has duplicate in the database";
            return false;
        }
    }
    });
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

