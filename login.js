$(document).ready(function () {
    let login = $('#login');

    login.on('click', function (e) {
        e.preventDefault();
        let user = $('#username').val();
        let pword = $('#password').val();

        $.ajax("login.php", {
            method: "POST",
            data: {
                username: user,
                password: pword
            }
        }).done(function (response) {
            if (response === "addUser.html") {
                window.location.replace(response);
                console.log("Login successful.\nlogin.js\n\n");
                console.log(response);
            } else if (response === "dashboard.html") {
                window.location.replace(response);
                console.log("Login successful.\nlogin.js\n\n");
                console.log(response);
            } else {
                console.log("Invalid page.");
                console.log("Login failed.\nlogin.js\n\n");
            }
        }).fail(function () {
            alert("Login failed\nlogin.js");
        });
    });
});