window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
        resetLoginForm();
    }
});
$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();
        validateLoginForm();
    });
});
function resetLoginForm() {
    document.getElementById('loginForm').reset();
}
function validateLoginForm() {
    var inputs = document.getElementsByClassName('input');
    var error = document.getElementsByClassName('error');
    var errorCount = 0;

    // const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    // if (!emailRegex.test(inputs[0].value)) {
    //     showError(error[0], "INVALID email format.");
    //     errorCount++;
    // }
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value.trim().length == 0) {
            showError(error[i], "Cannot be blank");
            errorCount++;
        }
        else{
            error[i].innerText ="" ;
        }
    }
    if (errorCount >= 2) {
        return;
    }
    performLogin(inputs[0].value, inputs[1].value);
}

function showError(element, message) {
    element.innerText = "";
    element.innerText = message;
}
function performLogin(email, password) {
    $.ajax({
        type: "POST",
        url: "login.php",
        data: {
            email: email,
            password: password,
            login: true
        },
        dataType: "text",
        success: function (response) {
            handleLoginResponse(response);
        }
    });
}

function handleLoginResponse(response) {
    var inputs = document.getElementsByClassName('input');
    var error = document.getElementsByClassName('error');

    switch (response) {
        case 'success':
            window.location.href = "profile.php";
            break;
        case 'successadmin':
            window.location.href = "admin/temp.php";
            break;
        case 'invalidPassword':
            showError(error[1], "Invalid Password");
            break;
        case 'invalidEmail':
            showError(error[0], "Invalid Email");
            break;
        default:
            showError(error, "Error");
    }
}
