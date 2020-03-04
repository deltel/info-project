$(document).ready(function () {
    let submitBtn = $('#submit');
    let logoutBtn = $('#logout');
    let homeBtn = $('#home');
    let addUser = $('#addUser');
    let newIssue = $('#newIssue');

    newIssue.on('click', function(){
        $.ajax("index.php", {
            method: "POST",
            data: {
                location: "newIssue"
            }
        }).done(function(response){
            window.location.replace(response);
        }).fail(function(){
            console.log("Redirect failed\ncreateIssue.js\n\n");
        })
    });


    addUser.on('click', function(){
        $.ajax("index.php", {
            method: "POST",
            data: {
                location: "addUser"
            }
        }).done(function(response){
            window.location.replace(response);
        }).fail(function(){
            console.log("Redirect failed\ncreateIssue.js\n\n");
        })
    });

    $.ajax("users.php", {
        method: "GET",
        data: {}
    }).done(function (response) {
        $('#assignedTo').html(response);
    }).fail(function () {
        console.log("Could not retrieve users.\ncreateIssue.js\n\n");
    });

    submitBtn.on('click', function () {
        let title = $('#title').val();
        let desc = $('#description').val();
        let assign = $('#assignedTo').val();
        let type = $('#type').val();
        let priority = $('#priority').val();

        $.ajax("createIssue.php", {
            method: "POST",
            data: {
                title: title,
                description: desc,
                assignedTo: assign,
                type: type,
                priority: priority
            }
        }).done(function (response) {
            console.log(response);
            response === "Issue successfully created.\ncreateIssue.php" ? alert("New issue created successfully") : alert("New issue could not be created");
            window.location.replace("createIssue.html")

        }).fail(function () {
            alert("Error in createIssue.js\nCannot create new issue.");
        });
    });

    logoutBtn.on('click', function () {
        $.ajax("logout.php", {
        }).done(function (response) {
            window.location.replace(response);
            console.log("Logout successful\ncreateIssue.js\n\n");
        }).fail(function () {
            console.log("Logout failed\ncreateIssue.js\n\n");
        });
    });

    homeBtn.on('click', function () {
        $.ajax("index.php", {
            method: "POST",
            data: {
                location: "dashboard.html"
            }
        }).done(function (response) {
            window.location.replace(response);
            console.log("Redirect successful\ncreateIssue.js\n\n");
        }).fail(function () {
            console.log("Redirect failed\ncreateIssue.js\n\n");
        });
    });
});
