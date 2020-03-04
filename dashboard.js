$(document).ready(function(){
    let homeBtn = $('#home');
    let newIssue = $('#newIssue');
    let issueBtn = $('#createIssue');
    let logoutBtn = $('#logout');
    let addUser = $('#addUser');

    $('a.description').on('click', function(){
        $('tr').each(function() {
            
            $.ajax("dashboard.php", {
                method: "POST",
                data: {
                    location: "fullDetails",
                    title: $(this).children('td').children('.description').text()
                }
            }).done(function(response){
                $('#main').html(response);
            }).fail(function(){
                console.log("Details redirect failed\ndashboard.js\n\n");
            });
        })
        
    });

    $('#all').addClass("active");

    $('#all').on('click', function(){
        $('#open').removeClass("active");
        $('#all').addClass("active");
        $('#mine').removeClass("active")
    }); 

    $('#open').on('click', function(){
        $('#all').removeClass("active");
        $('#open').addClass("active");
        $('#mine').removeClass("active");
    });

    $('#mine').on('click', function(){
        $('#all').removeClass("active");
        $('#mine').addClass("active");
        $('#open').removeClass("active")
    });
    

    issueBtn.on('click', function(){
        $.ajax("index.php", {
            method: "POST",
            data: {
                location: "newIssue"
            }
        }).done(function(response){
            window.location.replace(response);
        }).fail(function(){
            console.log("Redirect failed\ndashboard.js\n\n");
        });
    });

    $.ajax("dashboard.php", {
        method: "POST",
        data: {}
    }).done(function(response) {
        $('#result').html(response);
    }).fail(function(){
        console.log("Could not retrieve issues\ndashboard.js");
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
            console.log("Redirect failed\ndashboard.js\n\n");
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
            console.log("Redirect successful\ndashboard.js\n\n");
        }).fail(function () {
            console.log("Redirect failed\ndashboard.js\n\n");
        });
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
            console.log("Redirect failed\ndasboard.js\n\n");
        })
    });

    logoutBtn.on('click', function() {
        $.ajax("logout.php", {
        }).done(function(response){
            window.location.replace(response);
            console.log("Logout successful\ndashboard.js\n\n");
        }).fail(function(){
            console.log("Logout failed\ndashboard.js\n\n");
        });
    });
});