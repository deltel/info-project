$(document).ready(function () {
    let submitBtn = $('#submit');
    let logoutBtn = $('#logout');
    let homeBtn = $('#home');
    let newIssue = $('#newIssue');
    let addUser = $('#addUser');

    addUser.on('click', function(){
        $.ajax("index.php", {
            method: "POST",
            data: {
                location: "addUser"
            }
        }).done(function(response){
            window.location.replace(response);
        }).fail(function(){
            console.log("Redirect failed\naddUser.js\n\n");
        })
    });

    newIssue.on('click', function(){
        $.ajax("index.php", {
            method: "POST",
            data: {
                location: "newIssue"
            }
        }).done(function(response){
            window.location.replace(response);
        }).fail(function(){
            console.log("Redirect failed\naddUser.js\n\n");
        })
    });

    submitBtn.on('click', function () {
        let first = $('#firstname').val();
        let last = $('#lastname').val();
        let pword = $('#password').val();
        let email = $('#email').val();

        $.ajax("addUser.php", {
            method: "POST",
            data: {
                firstname: first,
                lastname: last,
                password: pword,
                email: email
            }
        }).done(function(response){
            console.log(response);
            response === "User successfully added.\naddUser.php" ? alert("New user added successfully") : alert("New user couldnot be added");
            
        }).fail(function(){
            alert("Error in addUser.js\nCannot add new user.");
        });
    });

    logoutBtn.on('click', function() {
        $.ajax("logout.php", {
        }).done(function(response){
            window.location.replace(response);
            console.log("Logout successful\naddUser.js\n\n");
        }).fail(function(){
            console.log("Logout failed\naddUser.js\n\n");
        });
    });

    homeBtn.on('click', function () {
        $.ajax("index.php", {
            method: "POST",
            data: {
                location: "home"
            }
        }).done(function (response) {
            window.location.replace(response);
            console.log("Redirect successful\naddUser.js\n\n");
        }).fail(function () {
            console.log("Redirect failed\naddUser.js\n\n");
        });
    });
});