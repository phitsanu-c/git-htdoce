var house_master = $.base64.decode(window.location.hash.substring(1)).substring(0, 8);
console.log(house_master);
// alert(h_master);
// if (h_master === "") {
//     logout();
//     return false;
// }

// Chack user_status
$.getJSON('config_db/login.php', function(msg) {
    // console.log(msg);
    // return false;
    $(".user_img").attr("src", "dist/images/users/" + msg.image);
    $(".user_name").html(msg.username);
    // console.log(msg.pages);
    if (msg.status_login === "") {
        window.location.href = "pages-login.html";
        return false;
    }
    console.log(msg.z_time);
    if (msg.z_time > 3) {
        logout();
        return false;
    }
    // console.log(window.location.pathname);
});

// logout
countdown(number = 180000);
$(".logout").on("click", function() {
    logout()
});

function countdown() {
    setTimeout(countdown, 1000);
    // $('#redirect').html("Redirecting in " + number + " seconds.");
    number--;
    if (number < 0) {
        logout();
        number = 0;
    }
    // $("#test_timr").html("countdown : " + number);
}

function logout() {
    $.ajax({
        url: 'config_db/login.php',
        type: 'POST',
        dataType: 'json',
        data: {
            logout: "logout"
        },
        success: function(ress) {
            if (ress === "logout_succress") {
                window.location = 'pages-login.html';
            }
        }
    });
}

function verticalNoTitle() {
    var loading = new Loading({
        discription: 'Loading...',
        defaultApply: true,
    });
    return loading;
    // loadingOut(loading);
}

function loadingOut(loading) {
    setTimeout(() => loading.out(), 1000);
}