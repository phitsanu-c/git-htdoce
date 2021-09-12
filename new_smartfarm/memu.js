$(".memu_sel").click(function() {
    $(this).addClass('mm-active');
    $('#pills-selectSite').show();
    $("#pills-selectHome").hide();
    $("#pills-selectReport").hide();
    $("#pills-profile").hide();
});
$(".memu_dash").click(function() {
    $(this).addClass('mm-active');
    $('#pills-selectSite').hide();
    $("#pills-selectHome").show();
    $("#pills-selectReport").hide();
    $("#pills-profile").hide();
});
$(".memu_report").click(function() {
    $('#pills-selectSite').hide();
    $("#pills-selectHome").hide();
    $("#pills-selectReport").show();
    $("#pills-profile").hide();
});

// --------------

$(".dpd_profile").click(function() {
    $(".memu_sel").removeClass('mm-active');
    $(".memu_dash").removeClass('mm-active');
    $(".memu_report").removeClass('mm-active');
    $('#pills-selectSite').hide();
    $("#pills-selectHome").hide();
    $("#pills-selectReport").hide();
    $("#pills-profile").show();
    $.ajax({
        url: "views/setting_profile.php",
        method: "post",
        data: {
            // s_master: res.s_master,
            pt: 1
        },
        // dataType: "json",
        success: function(resp) {
            $("#pills-profile").html(resp);
        }
    });
});
$(".dpd_setSite").click(function() {
    $(".memu_sel").removeClass('mm-active');
    $(".memu_dash").removeClass('mm-active');
    $(".memu_report").removeClass('mm-active');
    $('#pills-selectSite').hide();
    $("#pills-selectHome").hide();
    $("#pills-selectReport").hide();
    $("#pills-profile").show();
    $.ajax({
        url: "views/setting_profile.php",
        method: "post",
        data: {
            // s_master: res.s_master,
            pt: 2
        },
        // dataType: "json",
        success: function(resp) {
            $("#pills-profile").html(resp);
        }
    });
});
$(".dpd_setHoune").click(function() {
    $(".memu_sel").removeClass('mm-active');
    $(".memu_dash").removeClass('mm-active');
    $(".memu_report").removeClass('mm-active');
    $('#pills-selectSite').hide();
    $("#pills-selectHome").hide();
    $("#pills-selectReport").hide();
    $("#pills-profile").show();
    $.ajax({
        url: "views/setting_profile.php",
        method: "post",
        data: {
            // s_master: res.s_master,
            pt: 3
        },
        // dataType: "json",
        success: function(resp) {
            $("#pills-profile").html(resp);
        }
    });
});
$(".dpd_setting").click(function() {
    $(".memu_sel").removeClass('mm-active');
    $(".memu_dash").removeClass('mm-active');
    $(".memu_report").removeClass('mm-active');
    $('#pills-selectSite').hide();
    $("#pills-selectHome").hide();
    $("#pills-selectReport").hide();
    $("#pills-profile").show();
    $.ajax({
        url: "views/setting_profile.php",
        method: "post",
        data: {
            // s_master: res.s_master,
            pt: 4
        },
        // dataType: "json",
        success: function(resp) {
            $("#pills-profile").html(resp);
        }
    });
});